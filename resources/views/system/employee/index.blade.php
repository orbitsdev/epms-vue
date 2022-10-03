




@extends('layouts.main')


@section('content')

<div id="app">

    <router-link to="/create_employee"> Create Employee </router-link>
    <router-link to="/edit_employee"> Edit Employee </router-link>
    <hr>
    <router-view></router-view>
</div> 


@endsection 

