@extends('master/master')

@section('title', 'Settings')

@section('header')
    <h1 class="section-h1">Settings</h1>
@endsection

@section('content')
    <settings-component 
        :units="{{ json_encode($array) }}"
        :station_name="{{ json_encode($stationName) }}"
    >
    </settings-component>
@endsection

@section('footer')
    {{-- Sem mozem rozsirovat footer a dalsie informacie --}}
    @parent
@endsection