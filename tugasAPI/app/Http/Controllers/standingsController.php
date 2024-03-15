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
        $response = Http::get('https://apiv3.apifootball.com/?action=get_standings&league_id=152&APIkey=64ec71ef6fd9f638c4f93d95e89583fc0f67d5bae07ccc649bf66eb45b240006');
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
