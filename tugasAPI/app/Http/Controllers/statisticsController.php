<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class statisticsController extends Controller
{
    public function showAPI()
    {
        $response=Http::get("https://apiv3.apifootball.com/?action=get_statistics&match_id=86392&APIkey=64ec71ef6fd9f638c4f93d95e89583fc0f67d5bae07ccc649bf66eb45b240006");
        
        $responseData=$response->json();
        $array = $responseData["86392"]["player_statistics"];
        
        return view("index", ["data" => $array]);
    }

    public function playerAPI ($id)
    {
        $response = Http::get("https://apiv3.apifootball.com/?action=get_players&player_id=$id&APIkey=64ec71ef6fd9f638c4f93d95e89583fc0f67d5bae07ccc649bf66eb45b240006");

        if ($response->successful()) {
            $responseData = $response->json();
            return view("profilPemain", ["data" => $responseData]);
        } else {
            return response()->json(['error' => 'Player data not found'], 404);
        }
    }

}
