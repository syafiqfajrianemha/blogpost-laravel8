@extends('layouts.main')

@section('title', 'Create post')

@section('content')
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="thumbnail">Thumbnail</label>
            <input type="file" class="form-control" id="thumbnail" name="thumbnail">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('posts.index') }}" class="btn btn-danger">Back</a>
    </form>
@endsection