@extends ('layout')

@section('content')

    <div class="container">
        <div class="row mt-2 mb-5">
            <div class="col-lg-4">
                <a href="{{ action('TasksController@create') }}" class="btn btn-success">Create Task</a>
            </div>
        </div>

        @if(count($tasks))
            <div class="row mb-2 border-bottom border-success">
                <div class="col-lg-2">
                    <h5>Name</h5>
                </div>
                <div class="col-lg-3">
                    <h5>Description</h5>
                </div>
                <div class="col-lg-1">
                    <h5>Start</h5>
                </div>
                <div class="col-lg-1">
                    <h5>End</h5>
                </div>
                <div class="col-lg-2">
                    <h5>Assigned to</h5>
                </div>
                <div class="col-lg-1">
                    <h5>Status</h5>
                </div>
                <div class="col-lg-2">
                </div>
            </div>
            @foreach($tasks as $task)

            <div class="row mb-2">
                <div class="col-lg-2 rounded-left border border-right-0 border-secondary">
                    <span>{{ $task->name }}</span>
                </div>
                <div class="col-lg-3 border-top border-bottom border-secondary">
                    <span>{{ $task->description }}</span>
                </div>
                <div class="col-lg-1 border-top border-bottom border-secondary">
                    <span>{{ $task->start_time }}</span>
                </div>
                <div class="col-lg-1 border-top border-bottom border-secondary">
                    <span>{{ $task->end_time }}</span>
                </div>
                <div class="col-lg-2 border-top border-bottom border-secondary">
                    <span>{{ $task->assigned_to }}</span>
                </div>
                <div class="col-lg-1 rounded-right border border-left-0 border-secondary">
                    @switch($task->status)
                        @case(1)
                        <span>TODO</span>
                        @break

                        @case(2)
                        <span>In Progress</span>
                        @break

                        @case(3)
                        <span>Done</span>
                        @break

                        @default
                        <span>Empty</span>
                    @endswitch
                </div>
                <div class="col-lg-1">
                    <a href="{{ action('TasksController@edit', $task->id) }}" class="btn btn-primary">Edit</a>
                </div>
                <div class="col-lg-1">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form').submit();" class="btn btn-danger">Delete</a>
                    <form id="delete-form" action="{{ action('TasksController@destroy', $task->id) }}" method="POST" style="display: none;">
                        @method('delete')
                        @csrf
                    </form>
                </div>
            </div>
            @endforeach
        @endif

    </div>

@endsection