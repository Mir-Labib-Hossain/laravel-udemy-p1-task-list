@extends('layouts.app')
<div>
    @section('title', 'Tasks')
    @section('content')
        <ul>
            @forelse ($tasks as $task)
                <li>
                    <a href='{{ route('task', ['id' => $task->id]) }}'>
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
