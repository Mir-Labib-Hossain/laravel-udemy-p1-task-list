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
    @if ($tasks->count())
        {{ $tasks->links() }}
    @endif

</div>
