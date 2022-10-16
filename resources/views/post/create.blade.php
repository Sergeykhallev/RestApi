@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('post.store') }}" method="post" class="row g-3">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="title" value="{{ old('title') }}">

                @error('title')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" class="form-control" id="content" placeholder="content" >{{ old('content') }}</textarea>

                @error('content')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input name="image" type="text" class="form-control" id="image" placeholder="image" value="{{ old('image') }}">

                @error('image')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category_id" >
                    @foreach($categories as $category)
                        <option
                            {{ old('category_id') == $category->id ? 'selected' : ''}}
                            value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>

                @error('category_id')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <select multiple class="form-control" id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>

                @error('tags')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
