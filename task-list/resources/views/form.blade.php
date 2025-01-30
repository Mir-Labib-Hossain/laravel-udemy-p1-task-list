@extends('layouts.app')

@section('style')
    <style>
        .error-message {
            color: red;
            font-size: small
        }
    </style>

@endsection

@section('title', isset($task) ? 'Update Task' : 'Create Task')

@section('content')
    <form action="{{ isset($task) ? route('update', ['task' => $task->id]) : route('create') }}" method="post">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div>
            <label for="title">Title</label>
            <input text='text' name="title" id='title' value="{{ $task->title ?? old('title') }}" />
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea text='text' name="description" id='description' rows="5">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description">Long Description</label>
            <textarea text='text' name="long_description" id='long_description' rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit">{{ isset($task) ? 'Update' : 'Create' }}</button>
    </form>
@endsection
