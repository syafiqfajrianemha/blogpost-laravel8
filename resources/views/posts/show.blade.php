@extends('layouts.main')

@section('title', 'Show post')

@section('content')
    <div class="card mb-3 shadow-lg">
        <img src="{{ asset('storage/' . $post->thumbnail) }}" class="card-img-top" alt="img">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            <p class="card-text"><small class="text-muted">Last updated {{ $post->updated_at->diffForHumans() }}</small></p>
        </div>
    </div>
    <a href="{{ route('posts.index') }}" class="btn btn-danger mb-5"><<< Back</a>
@endsection