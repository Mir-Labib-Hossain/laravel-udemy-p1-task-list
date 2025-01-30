@extends('layouts.app')

@section('style')
    <style>
        .error-message {
            color: red;
            font-size: small
        }
    </style>

@endsection

@section('title', 'Update Task')

@section('content')
    <form action="{{ route('update', ['task' => $task->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input text='text' name="title" id='title' value="{{ $task->title }}" />
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea text='text' name="description" id='description' rows="5">{{ $task->description }}</textarea>
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description">Long Description</label>
            <textarea text='text' name="long_description" id='long_description' rows="10">{{ $task->long_description }}</textarea>
            @error('long_description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
