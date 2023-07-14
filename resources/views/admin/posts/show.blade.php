@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-4">
    <div class="row justify-content-between">
        <h1>{{ $post->title }}</h1>
        <h3>Categoria: {{ $post->category ? $post->category->name : "Senza categoria" }}</h3>
        <h4>Tags</h4>
        <ul>
            @foreach ($post->tags as $tag)
            <li>{{$tag->name}}</li>
            @endforeach
        </ul>
        {{-- <h2>Categoria: {{ $post->category?->name }}</h2> --}}
        <p>{{ $post->content }}</p>
        <img src="{{ asset("storage/" . $post->image) }}" alt="{{ $post->title }}" />
    </div>
</div>

@endsection