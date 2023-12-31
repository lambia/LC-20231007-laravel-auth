@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-4">
    <div class="row justify-content-between">
        @foreach ($posts as $post)
            <div class="card p-0 mb-4" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset("storage/".$post->image) }}" alt="{{ $post->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    @if ($post->category)
                        <p>Categoria: {{ $post->category->name }} </p>
                    @else
                        <p>Non categorizzato</p>
                    @endif

                    <p>Tags: 
                    @forelse ($post->tags as $tag)
                        <span>{{$tag->name}}</span>
                    @empty
                        <span>Nessuno</span>
                    @endforelse
                    </p>
                    <a href="{{ route("admin.posts.show", $post) }}" class="btn btn-primary">View details</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection