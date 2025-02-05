@extends('layouts.app')


@section('title', isset($task) ? 'Update Task' : 'Create Task')

@section('content')
    <form class="form" action="{{ isset($task) ? route('update.api', ['task' => $task->id]) : route('create.api') }}"
        method="post">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset

        <div class="my-10">
            <label for="title">Title</label>
            <input text='text' name="title" id='title' value="{{ $task->title ?? old('title') }}" />
            @error('title')
                <p class="txt-err">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-10">
            <label for="description">Description</label>
            <textarea text='text' name="description" id='description' rows="5">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="text-error">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-10">
            <label for="long_description">Long Description</label>
            <textarea text='text' name="long_description" id='long_description' rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="txt-err">{{ $message }}</p>
            @enderror
        </div>
        <button class="btn" type="submit">{{ isset($task) ? 'Update' : 'Create' }}</button>
    </form>
@endsection
