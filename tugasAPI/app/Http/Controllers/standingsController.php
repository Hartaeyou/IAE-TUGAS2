<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;

class StandingsController extends Controller
{
    public function standings(Request $request)
    {
        $response = Http::get('https://apiv3.apifootball.com/?action=get_standings&league_id=152&APIkey=cccc5fb4e86b9e7e606e690a90464eb123484f9ddfa22f5ea16e7a6e3cba5810');
        $responseData = $response->json();

        $currentPage = $request->input('page', 1);
        $perPage = 10;
        $offset = ($currentPage - 1) * $perPage;

        $data = collect($responseData)->slice($offset, $perPage)->all();

        $collection = new Collection($responseData);
        $totalPages = ceil($collection->count() / $perPage);
        $isLastPage = $currentPage >= $totalPages;

        $paginator = new Paginator($responseData, $perPage, $currentPage);

        return view('standings.standings', [
            'standings' => $data,
            'paginator' => $paginator,
            'isLastPage' => $isLastPage,
            'totalPages' => $totalPages
        ]);
    }
}
