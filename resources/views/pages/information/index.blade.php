@extends('layouts.app')

@section('content')
    <section class="news-detail my-5 py-5">
        <div class="container">
            <div class="text-center title">
                <h1>{{$information->title}}</h1>
                <img src="/image/informations/{{$information->image}}">
            </div>
            <div class="body mt-5">
                {!! $information->content !!}
            </div>
            <div class="sumber mt-4">
                <b>Sumber</b>
                <ul>
                    <li>{{$information->source}}</li>                    
                <ul>
            </div>
        </div>
    </section>
@endsection