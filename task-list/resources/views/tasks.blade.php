@extends('layouts.app')
<div>
    @section('title', 'Tasks')
    @section('content')
        <a href="/task/create">Create</a>
        <ul>
            @forelse ($tasks as $task)
                <li>
                    <a href='{{ route('task', ['task' => $task->id]) }}'>
                        {{ $task->title }}
                    </a>
                </li>
            @empty
                <p>Empty</p>
            @endforelse
        </ul>
    @endsection
    {{-- @else
        <p>No tasks</p>
    @endif --}}

</div>
