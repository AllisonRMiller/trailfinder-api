<?php

namespace App\Http\Controllers;

use App\User;
use App\Trip;
use App\Journey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected function generateAccessToken($user)
    {
        $token = $user->createToken($user->email . '-' . now());

        return $token->accessToken;
    }


    public function logout(Request $request){
        $request->user()->token()->revoke();
        $request->user()->token()->delete;
        $response = "You have successfully logged out.";
        return response($response,200);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $token = $user->createToken($user->email . '-' . now());


        $journey = Journey::create([
            'name' => "Journey Zero",
            'user_id' => $user->id
        ]);

        $trip = Trip::create([
            'name' => "Saved Trails",
            'journey_id' => $journey->id,
            'user_id' => $user->id
        ]);

        // $user->trips()->save($trip);

        return response()->json(
            [
                'token' => $token->accessToken,
                'user' => $user,
                'allTrips' => $trip,
                'allJourneys' => $journey

            ]
        ,200);
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            $token = $user->createToken($user->email . '-' . now());

            return response()->json([
                'token' => $token->accessToken,
                'user' => $user
            ],200);
        }
    }
}
