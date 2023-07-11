@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-4">
    <div class="row justify-content-between">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <img src="{{ $post->image }}" alt="{{ $post->title }}" />
    </div>
</div>

@endsection