@extends('master/master')

@section('title', 'Temperature')
    
@section('header')
    <h1 class="section-h1">Temperature</h1>
@endsection

@section('content')

    <graph-component 
        :dataset="{{ json_encode($dataset) }}" 
        :graph_name="{{ json_encode($name) }}"
        :csrf_token="{{ json_encode($csrf_token) }}"
    >
    </graph-component>

@endsection

@section('footer')
    {{-- Sem mozem rozsirovat footer a dalsie informacie --}}
    @parent
@endsection
