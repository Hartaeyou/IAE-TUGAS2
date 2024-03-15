@extends('layout.main')

@section('title', 'Standings')

@section('span','Standings')


@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="margin-top: 50px;">
        <div class="card border-o col-md-10 text-center ">
            <div class="card-header" style="background-color: transparent" >
                <h5 class="card-title">
                    Standings Results
                </h5>
                <h6 class="card-subtitle text-muted">
                    Premier League
                </h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>                        
                        <th scope="col">Rank</th>
                        <th scope="col" class="text-start">Teams Name</th>
                        <th scope="col">Win</th>
                        <th scope="col">Draw</th>
                        <th scope="col">Lose</th>
                        <th scope="col">GA</th>
                        <th scope="col">GF</th>
                        <th scope="col">Points</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($standings as $standing)
                        <tr>
                            <td>{{$standing['overall_league_position']}}</td>
                            <td class="text-start"><img src="{{$standing['team_badge']}} " alt="" width="25" height="25">   {{$standing['team_name']}}</td>
                            <td>{{$standing['overall_league_W']}}</td>
                            <td>{{$standing['overall_league_D']}}</td>
                            <td>{{$standing['overall_league_L']}}</td>
                            <td>{{$standing['overall_league_GA']}}</td>
                            <td>{{$standing['overall_league_GF']}}</td>
                            <td>{{$standing['overall_league_PTS']}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex align-items-end">            
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item {{ $paginator->currentPage() == 1 ? 'disabled' : '' }}"><a class="page-link" href="/standings{{ $paginator->previousPageUrl() }}">Previous</a></li>
                            @for ($page = 1; $page <= $totalPages; $page++)
                                <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}"><a class="page-link" href="/standings{{ $paginator->url($page) }}">{{ $page }}</a></li>
                            @endfor
                            <li class="page-item {{ $paginator->currentPage() == $totalPages ? 'disabled' : '' }}"><a class="page-link" href="/standings{{ $paginator->nextPageUrl() }}">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection