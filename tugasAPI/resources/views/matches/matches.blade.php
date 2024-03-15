@extends('layout.main')

@section('title','Match Results')

@section('span','Match Results')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="margin-top: 50px;">
        <div class="card border-o col-md-14 text-center ">
            <div class="card-header" style="background-color: transparent" >
                <h5 class="card-title">
                    Match Results
                </h5>
                <h6 class="card-subtitle text-muted">
                    Premier League
                </h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col" colspan="7">Matches</th>
                        <th scope="col">Location</th>
                        <th scope="col">Time</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($data as $dat)
                        <tr >
                            <td class="text-end"><img src="{{$dat['team_home_badge']}}" alt="" width="25" height="25"></td>
                            <td scope="row" class="text-start">{{$dat['match_hometeam_name']}}</td>
                            <td class="text-start">{{$dat['match_hometeam_ft_score']}}</td>
                            <td>VS</td>
                            <td>{{$dat['match_awayteam_ft_score']}}</td>
                            <td class="text-end">{{$dat['match_awayteam_name']}}</td>
                            <td class="text-start"><img src="{{$dat['team_away_badge']}}" alt="" width="25" height="25"></td>
                            <td>{{$dat['match_stadium']}}</td>
                            <td>{{$dat['match_date']}}</td>
                            <td><a href="/matchDetails/{{$dat['match_id']}}" class="btn btn-primary btn-sm">Detail Match</a></td>
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
                <div class="d-flex align-items-end">            
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item {{ $paginator->currentPage() == 1 ? 'disabled' : '' }}"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Previous</a></li>
                            @for ($page = 1; $page <= $totalPages; $page++)
                                <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}"><a class="page-link" href="{{ $paginator->url($page) }}">{{ $page }}</a></li>
                            @endfor
                            <li class="page-item {{ $paginator->currentPage() == $totalPages ? 'disabled' : '' }}"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a></li>
                        </ul>
                    </nav>
                </div>
                    
            </div>
        </div>
    </div>
</div>
<script src="js/script.js"></script>
@endsection