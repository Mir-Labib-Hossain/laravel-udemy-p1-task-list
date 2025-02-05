@extends('layouts.app')
@section('title', $task->title)

@section('content')
    <div>
        <a href="{{ route('list.view') }}" class="link"><- List</a>
                <div class="my-10">
                    <p>
                        {{ $task->description }}
                    </p>
                    @if ($task->long_description)
                        <p>{{ $task->long_description }}</p>
                    @endif
                    <p>
                        @if ($task->completed)
                            <p class="font-bold text-lime-500">Completed</p>
                        @else
                            <p class="font-bold text-rose-500">Incomplete</p>
                        @endif

                    </p>
                    <p>
                        <span class="text-secondary"> Created</span> {{ $task->created_at->diffForHumans() }}
                    </p>
                    <p>
                        <span class="text-secondary"> Updated</span> {{ $task->updated_at->diffForHumans() }}
                    </p>
                </div>
                <div class="flex gap-4">
                    <form action="{{ route('toggle.api', ['task' => $task]) }}" method="post">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn">
                            {{ $task->completed ? 'Mark as Incomplete' : 'Mark as Complete' }}
                        </button>
                    </form>

                    <form action="{{ route('delete.api', ['task' => $task]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-red" type="submit">Delete</button>
                    </form>
                    <a href="{{ route('update.view', ['task' => $task]) }}">
                        <button class="btn btn-green">Edit</button>
                    </a>
                </div>
            @endsection
