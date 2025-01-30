@extends('layouts.app')
@section('title', $task->title)

@section('content')
    <div>
        <a href="{{ route('tasks') }}">Tasks</a>
        <p>
            {{ $task->description }}
        </p>
        @if ($task->long_description)
            <p>{{ $task->long_description }}</p>
        @endif
        <p>Created At: {{ $task->created_at }}</p>
        <p>Updated At: {{ $task->updated_at }}</p>
        <input type="checkbox" checked={{ $task->completed }} />
    </div>
    <form action="{{ route('delete', ['task' => $task->id]) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit">Delete</button>
    </form>
@endsection
