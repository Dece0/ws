@extends('master/master')

@section('title', 'Dashboard')

@section('scripts')
    {{--<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>--}}
    {{-- <script src="{{ asset('/js/vue.js') }}"></script> --}}
@endsection

@section('header')
    <h1 class="section-h1">Dashboard</h1>
@endsection

@section('content')
    <dashboard-component
        :last_mensuration="{{ json_encode($lastMensuration) }}"
        :coords="{{ json_encode($coords) }}"
    ></dashboard-component>
    <forecast-component 
        :forecast_info="{{ json_encode($forecastInfo) }}"
        :forecast_weather="{{ json_encode($forecastWeather) }}"
    ></forecast-component>

{{-- <dashboard-date-item></dashboard-date-item>

    <dashboard-time-item></dashboard-time-item>

    <dashboard-counter-item></dashboard-counter-item>

    <dashboard-gps-item></dashboard-gps-item>

    <dashboard-item v-for="(item) in {{ json_encode($last_mensuration) }}" :data="item" :key="item.id"></dashboard-item> --}}

    {{--<dashboard-item v-for="item in {{ json_encode($result) }}" :data="item"></dashboard-item>--}}

{{--
    @foreach ($result as $item)
        @php
            $temp = explode(' ', $item->time);    
        @endphp

        <div class="container">
            <small class="container-text">{{ $item->quantity_name }} at {{ $temp[1] }}</small>
            <div class="container-data">
                <div class="data">{{ $item->value }}</div>
                <small class="container-text">{{ $item->unit_symbol }}</small>
            </div>
        </div>
    @endforeach
--}}

{{--
    <div class="container">
        <small class="container-text">Current temperature</small>
        <div class="container-data"><div class="data">25</div><small class="container-text">°C</small></div>
    </div>

    <div class="container">
        <small class="container-text">Yesterday average temperature</small>
        <div class="container-data"><div class="data">22,5</div><small class="container-text">°C</small></div>
    </div>

    <div class="container">
        <small class="container-text">Current humidity</small>
        <div class="container-data"><div class="data">85</div><small class="container-text">%</small></div>
    </div>

    <div class="container">
        <small class="container-text">Yesterday humidity</small>
        <div class="container-data"><div class="data">83</div><small class="container-text">%</small></div>
    </div>

    <div class="container">
        <small class="container-text">Current air quality (rating)</small>
        <div class="container-data"><div class="data">Good</div><small class="container-text"><div class="container-rating green"></div></small></div>
    </div>

    <div class="container">
        <small class="container-text">Current air quality (NO<sub>2</sub>)</small>
        <div class="container-data"><div class="data">35</div><small class="container-text"></small></div>
    </div>

    <div class="container">
        <small class="container-text">Current air quality (NOx)</small>
        <div class="container-data"><div class="data">85</div><small class="container-text"></small></div>
    </div>

    <div class="container">
        <small class="container-text">Current air quality (SO<sub>2</sub>)</small>
        <div class="container-data"><div class="data">11</div><small class="container-text"></small></div>
    </div>

    <div class="container">
        <small class="container-text">Current air quality (O<sub>3</sub>)</small>
        <div class="container-data"><div class="data">15</div><small class="container-text"></small></div>
    </div>

    <div class="container">
        <small class="container-text">Yesterday air quality (rating)</small>
        <div class="container-data"><div class="data">Good</div><small class="container-text"><div class="container-rating green"></div></small></div>
    </div>

    <div class="container">
        <small class="container-text">Current radiation</small>
        <div class="container-data"><div class="data">10</div><small class="container-text">nSv/h</small></div>
    </div>

    <div class="container">
        <small class="container-text">Yesterday radiation</small>
        <div class="container-data"><div class="data">9,5</div><small class="container-text">nSv/h</small></div>
    </div>
--}}

@endsection

@section('footer')
    {{-- Sem mozem rozsirovat footer a dalsie informacie --}}
    @parent
@endsection