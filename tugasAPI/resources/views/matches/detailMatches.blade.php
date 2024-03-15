@extends('layout.main')

@section('title', 'Match Detail')

@section('span','Match Detail')


@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="margin-top: 40px;">
        <div class="card border-o col-md-10 text-center ">
            <div class="card-header" style="background-color: transparent" >
                <h5 class="card-title">
                    Team Statistics
                </h5>
                
                <h6 class="card-subtitle text-muted text-center">
                    <div class="d-flex justify-content-between">

                        @foreach($datas as $data)
                        <div class="d-flex justify-content-start align-items-center">
                            <span><img src="{{$data['team_home_badge']}}" alt="" width="70" height="70"></span>
                            <span style="font-size:25px; color:black">{{$data['match_hometeam_name']}}</span>
                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <span style="font-size:25px; color:black">{{$data['match_awayteam_name']}}</span>
                            <span ><img src="{{$data['team_away_badge']}}" alt="" width="70" height="70"></span>
                        </div>
                        @endforeach
                    </div>
                </h6>
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{$data['match_hometeam_score']}}</td> 
                            <th >FullTime Score</th>
                            <td>{{$data['match_awayteam_score']}}</td> 
                        </tr>
                        @endforeach
                    </tbody>
                    <tbody>
                        @foreach($array as $arr)
                        <tr>
                            <td>{{$arr['home']}}</td> 
                            <th>{{$arr['type']}}</th>
                            <td>{{$arr['away']}}</td> 
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-start">
                    <a href="/" class="btn btn-primary ">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection