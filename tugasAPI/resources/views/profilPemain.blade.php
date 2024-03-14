@extends('layout.main')

@section('content')

<table>
    @foreach ($data as $dat)

    <tr>{{$dat['player_id']}}</tr>
    <tr>{{$dat['player_name']}}</tr>
    @endforeach  
</table>

@endsection