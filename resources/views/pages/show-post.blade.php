@extends('layouts.main-layout')

@section('content')
@include('includes.categories')
    <div class="container">
    <h1 class="mt-5 mb-4 text-center">{{$post['title']}}</h1>
    <a href="/" class="btn btn-outline-primary mb-4">Back</a>
    <article>
        <p>{{ $post['text'] }}</p>
    </article>
</div>


@endsection