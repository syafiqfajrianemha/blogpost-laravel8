@extends('layouts.main')

@section('title', 'Posts')

@section('content')
    @forelse ($posts as $post)
        <div class="card mb-4 shadow">
            <div class="card-body">
                <h3 class="card-title">
                    <a href="{{ route('posts.show', ['post' => $post->id]) }}" style="color: #212529">
                        {{ $post->title }}
                    </a>
                </h3>
                <h6 class="card-subtitle mb-2 text-muted">
                    Created {{ $post->created_at->diffForHumans() }}
                </h6>
                <p class="card-text">{{ Str::limit($post->content, 100, '...') }}</p>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin?')">Delete</button>
                </form>
            </div>
        </div>
    @empty
        <div class="alert alert-danger" role="alert">
            No posts yet..
        </div>
    @endforelse
@endsection