@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Sidebar -->
     @extends('layouts.sidebar')

    <!-- Page Content -->
    <div class="content">
        <div class="row  bg-white mx-auto">
            <div class="mx-auto">
                <h2 class="mt-4">Add Tasks</h2>

            <div class="row mt-4">
                <div class="col-md-6 bg-white mx-auto" >
                        <form method="POST" action="{{ route('tasks-store') }}">
                          @csrf
                          <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Title:</label>
                            <input type="text" class="form-control" name="title" id="recipient-name">
                            @error('title')
                                <strong class="text-danger text-sm">{{ $message }}</strong>
                            @enderror
                          </div>

                          <div class="mb-3">
                            <label for="message-text" class="col-form-label">Descriptions:</label>
                            <textarea class="form-control" name="description" id="message-text"></textarea>
                            @error('description')
                                <strong class="text-danger text-sm">{{ $message }}</strong>
                          @enderror
                          </div>
                          <div class="mb-3">
                            <label for="priority" class="form-label">Priority</label>
                            <select class="form-control" id="priority" name="priority" required>
                                <option value="low">Low</option>
                                <option value="medium" selected>Medium</option>
                                <option value="high">High</option>
                            </select>
                            @error('priority')
                            <strong class="text-danger text-sm">{{ $message }}</strong>
                          @enderror
                          </div>

                          <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="pending" selected>Pending</option>
                                <option value="in_progress">In Progress</option>
                                <option value="completed">Completed</option>
                            </select>
                            @error('status')
                            <strong class="text-danger text-sm">{{ $message }}</strong>
                           @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">---Select Projects--</label>
                            <select class="form-control" id="project_id" name="project_id" required>
                                @foreach($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->title }}</option>
                                @endforeach
                            </select>
                            @error('project_id')
                            <strong class="text-danger text-sm">{{ $message }}</strong>
                           @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Deadline Date</label>
                             <input type="date" class="form-control" name="due_date" id="due date">
                            @error('due_date')
                            <strong class="text-danger text-sm">{{ $message }}</strong>
                           @enderror
                        </div>

                          <div class="mb-3">
                          <button class="btn btn-primary text-center text-white" type="submit">Save</button>
                            </div>
                        </form>
                      </div>

                </div>
            </div>

        </div>
     </div>
 </div>
</div>
@endsection
