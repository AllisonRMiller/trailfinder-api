<?php

namespace App\Http\Controllers;

use App\User;
use App\Trip;
use App\Journey;
use App\Trail;
use App\TrailTrip;
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


    public function addTrail(Request $request){

        $userID = $request['user_id'];

        $trip = Trip::where('user_id', $userID)->first();

        $trail = Trail::create([
            'api_id' => $request['api_id'],
            'name' => $request['name'],
            'stars' => $request['stars'],
            'difficulty' => $request['difficulty']
        ]);

        $trailtrip = TrailTrip::create([
            'trail_id' => $trail->id,
            'trip_id' => $trip->id
        ]);

        $response = "Trail added";
        return response($response,200);
    }

    public function viewSaved(Request $request){

        $userID = $request['user_id'];

        $trips = Trip::where('user_id', $userID)->get();
        $collectedTrails = [];

        foreach ($trips as $trip){
            $trailtrips = TrailTrip::where('trip_id', $trip->id)->get();
            foreach ($trailtrips as $trailtrip){
                $trails = Trail::where('id', $trailtrip->trail_id)->get();
                array_push($collectedTrails, $trails[0]);
            };
            $package = collect(["trip"=> $trip,"trails" =>$collectedTrails]);
        };

        $response = $package;
        return response($response,200);

    }

}
