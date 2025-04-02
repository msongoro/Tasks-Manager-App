@extends('layouts.app')

@section('content')
<div class="container relative">
        @if(session('success'))
            <div id="success-alert" class="bg-green-500 text-white p-3 rounded-md shadow-md fixed bottom-10 right-5">
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
                  <h2 class="mt-4 text-xl text-gray-950 font-bold">Projects List</h2>
                  <a href="{{ route('projects-add') }}" class=" mt-4 bg-dark text-center text-sm text-white px-2" style="text-decoration: none; height:40px; border-radius:10px;">Add Projects</a>
                </div>
                <form method="GET" action="{{ route('users-projects') }}" class="mb-3">
                  <div class="input-group">
                      <input type="text" name="search" class="form-control" placeholder="Search tasks..." value="{{ request('search') }}">
                      <button type="submit" class="btn btn-primary">Search</button>
                  </div>
              </form>
                <div
                  class="table-responsive"
                >
                  <table
                    class="table striped table-hover px-4"
                  >
                    <thead>
                      <tr>
                        <th scope="col">Sn</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">DeadLine Date</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->status }}</td>
                            <td>{{ $project->start_date }}</td>
                            <td>{{ $project->end_date }}</td>
                            <td>{{ $project->due_date }}</td>
                            <td class="flex gap-1">
                            <a href="{{ route('projects-edit', $project->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ route('projects-delete', $project->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
                successAlert.style.position = "absolute";
                successAlert.style.bottom="0px";
                successAlert.style.right="30px";
                successAlert.style.zIndex = "1000";
                setTimeout(() => successAlert.remove(), 500);
            }

            if (errorAlert) {
                errorAlert.style.transition = "opacity 0.5s";
                errorAlert.style.opacity = "0";
                setTimeout(() => errorAlert.remove(), 500);
            }
        }, 3000); // 3 seconds before disappearing
    });
</script>
</div>
@endsection
