<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class matchesController extends Controller
{
    public function matches (Request $request)
    {
        $response = Http::get('https://apiv3.apifootball.com/?action=get_events&from=2023-03-05&to=2023-04-05&league_id=152&APIkey=cccc5fb4e86b9e7e606e690a90464eb123484f9ddfa22f5ea16e7a6e3cba5810');
        $responseData=$response->json();

        $currentPage = $request->input('page', 1);
        $perPage = 5;
        $offset = ($currentPage - 1) * $perPage;
        $data = collect($responseData)->slice($offset, $perPage)->all();
        
        $collection = new Collection($responseData);
        $totalPages = ceil($collection->count() / $perPage);
        $isLastPage = $currentPage >= $totalPages;

        $paginator = new Paginator($responseData, $perPage, $currentPage);

        return view('matches/matches', [
        'data' => $data, 
        'paginator' => $paginator, 
        'isLastPage' => $isLastPage, 
        'totalPages'=>$totalPages]);
    }


    public function matchDetails($id)
    {
        $response=Http::get("https://apiv3.apifootball.com/?action=get_events&league_id=152&APIkey=cccc5fb4e86b9e7e606e690a90464eb123484f9ddfa22f5ea16e7a6e3cba5810&from=2023-03-05&to=2023-04-05&match_id=$id");
        $responseData=$response->json();
        foreach($responseData as $data){
            $array = $data['statistics'];
        }

        return view('matches.detailMatches' ,[ "array" => $array, "datas" => $responseData]   );
    }
}
