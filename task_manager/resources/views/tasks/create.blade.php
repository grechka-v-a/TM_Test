@extends ('layout')

@section('content')

    <div class="container mt-5">
        <div class="row mt-2 mb-5">
            <div class="col-lg-4">
                <a href="/" class="btn btn-danger">Back</a>
            </div>
        </div>
        <div class="row">
            <h3 class="col-lg-12 mb-4 text-center">Create new Task</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form method="POST" action="{{action('TasksController@store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nane:</label>
                        <input name="name" class="form-control" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" rows="5" class="form-control" id="desc" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="start_time">Start time:</label>
                        <input type="date" name="start_time" class="form-control" id="start_time" required>
                    </div>
                    <div class="form-group">
                        <label for="end_time">End time:</label>
                        <input type="date" name="end_time" class="form-control" id="end_time" required>
                    </div>
                    <div class="form-group">
                        <label for="assigned_to">Assigned to:</label>
                        <textarea name="assigned_to" rows="1" class="form-control" id="assigned_to" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status:</label>
                        <input type="radio" id="status-1" name="status" value="1" checked>
                        <label for="status-1">TODO</label>
                        <input type="radio" id="status-2" name="status" value="2">
                        <label for="status-2">In Progress</label>
                        <input type="radio" id="status-3" name="status" value="3">
                        <label for="status-3">Done</label>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
                @if(count($errors))
                    <div class="mt-4">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as  $error)
                                <li class="alert alert-danger mt-2">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection