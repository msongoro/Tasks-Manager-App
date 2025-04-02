@extends('layouts.app')

@section('content')
<div class="container mr-48">
    @if(session('success'))
    <div id="success-alert" class="bg-green-500 text-white p-3 rounded-md shadow-md fixed bottom-5 right-5">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div id="error-alert" class="bg-red-500 text-white p-3 rounded-md shadow-md fixed top-5 right-5">
        {{ session('error') }}
    </div>
@endif
    <!-- Sidebar -->
     @extends('layouts.sidebar')

    <!-- Page Content -->
          <div class="content">
              <div class=" bg-white mr-40 px-8 relative">
                <div class="d-flex justify-content-between btn-sm">
                  <h2 class="mt-4 text-xl text-gray-950 font-bold">Tasks List</h2>
                  <a href="{{ route('tasks-add') }}" class=" mt-4 bg-dark text-center text-sm text-white px-2" style="text-decoration: none; height:40px; border-radius:10px;">Add Tasks</a>
                </div>
                <form method="GET" action="{{ route('users-tasks') }}" class="mb-3">
                  <div class="input-group">
                      <input type="text" name="search" class="form-control" placeholder="Search tasks..." value="{{ request('search') }}">
                      <button type="submit" class="btn btn-primary">Search</button>
                  </div>
              </form>
                <div
                  class="table-responsive max-w-full"
                >
                  <table
                    class="table striped table-hover px-4"
                  >
                    <thead>
                      <tr>
                        <th scope="col">Sn</th>
                        <th scope="col">Project Name</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Priority</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">DeadLine</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($tasks as $task)
                      <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ optional($task->projects)->title ?? 'No Project' }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td class="{{ $task->priority=='high'? 'bg-danger px-4 rounded-md text-center text-white' : ' bg-yellow-300 px-4 rounded-md text-center'  }}">{{ $task->priority }}</td>
                        <td>{{ $task->status }}</td>
                        <td>{{ $task->created_at }}</td>
                        <td>{{ $task->due_date }}</td>
                        <td class="flex gap-2">
                            <a href="{{ route('tasks-edit', $task->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ route('tasks-delete', $task->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>

           </div>
          </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                setTimeout(function () {
                    let successAlert = document.getElementById('success-alert');
                    let errorAlert = document.getElementById('error-alert');

                    if (successAlert) {
                        successAlert.style.transition = "opacity 0.5s";
                        successAlert.style.opacity = "0";
                        successAlert.style.zIndex = "1000";
                        setTimeout(() => successAlert.remove(), 500);
                    }

                    if (errorAlert) {
                        errorAlert.style.transition = "opacity 0.5s";
                        errorAlert.style.opacity = "0";
                        setTimeout(() => errorAlert.remove(), 500);
                    }
                }, 3000); // 8 seconds before disappearing
            });
        </script>
        </div>
@endsection
