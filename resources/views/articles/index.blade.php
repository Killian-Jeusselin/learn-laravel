@extends('layout.main-layout')

@section('content')
    @foreach ($articles as $article)
        <li><p>{{$article->title}}</p></li>
    @endforeach
@endsection