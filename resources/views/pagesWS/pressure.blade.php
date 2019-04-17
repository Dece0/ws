@extends('master/master')

@section('title', 'Pressure')

@section('scripts')

@endsection

@section('header')
    <h1 class="section-h1">Pressure</h1>
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