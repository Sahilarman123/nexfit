<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'trainer_name' => 'required|string|max:100',
            'trainer_last_name' => 'required|string|max:100',
            'trainer_email' => 'required|string|email|max:255|unique:trainers',
            'trainer_mobile' => 'required|string|max:20',
            'trainer_dob' => 'required|date',
            'trainer_gender' => 'required|in:male,female,other',
            'trainer_address' => 'required|string|max:255',
            'trainer_city' => 'required|string|max:100',
            'trainer_state' => 'required|string|max:100',
            'trainer_pincode' => 'required|string|max:20',
            'trainer_country' => 'required|string|max:100',
            'trainer_password' => 'required|string|min:8|confirmed'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $trainer = Trainer::create([
            'trainer_name' => $request->trainer_name,
            'trainer_last_name' => $request->trainer_last_name,
            'trainer_email' => $request->trainer_email,
            'trainer_mobile' => $request->trainer_mobile,
            'trainer_dob' => $request->trainer_dob,
            'trainer_gender' => $request->trainer_gender,
            'trainer_address' => $request->trainer_address,
            'trainer_city' => $request->trainer_city,
            'trainer_state' => $request->trainer_state,
            'trainer_pincode' => $request->trainer_pincode,
            'trainer_country' => $request->trainer_country,
            'trainer_password' => Hash::make($request->trainer_password),
        ]);

        // Handle any post-registration actions

        return response()->json(['message' => 'Trainer registered successfully'], 201);
    }

    public function login(Request $request)
    {
        // Change 'email' to 'trainer_email' and 'password' to 'trainer_password'
        $credentials = [
            'trainer_email' => $request->input('trainer_email'),
            'password' => $request->input('trainer_password'),
        ];

        if (Auth::guard('trainer')->attempt($credentials)) {
            $trainer = Auth::guard('trainer')->user();
            $token = Str::random(60); // Handle token generation as needed
            // Save or return the token as needed
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }


    public function socialLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'provider' => 'required|string',
            'provider_id' => 'required|string',
            'trainer_email' => 'required|string|email|max:255',
            'trainer_name' => 'required|string|max:100',
            'trainer_last_name' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $trainer = Trainer::where('trainer_email', $request->trainer_email)->first();

        if (!$trainer) {
            $trainer = Trainer::create([
                'trainer_name' => $request->trainer_name,
                'trainer_last_name' => $request->trainer_last_name,
                'trainer_email' => $request->trainer_email,
                'trainer_password' => Hash::make('social_login_dummy_password'),
            ]);
        }

        // Handle social account linking

        $token = Str::random(60); // Generate a token or use another method
        // Save the token to the trainer's record or return as response
        return response()->json(['token' => $token], 200);
    }
}
