@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Sidebar -->
     @extends('layouts.sidebar')

    <!-- Page Content -->
    <div class="content">
        <div class="row  bg-white mr-40 px-8">
            <h2 class="mt-4">Users List</h2>
            <div class="row mt-4">
                <div class="col-md-12 bg-white" >
                            <table class="table table-striped table-bordered" style="background-color: white;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                 @foreach ($users as $user)
                                 <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="d-flex px-2">
                                      <a href="" class="bg-danger  actions">Delete</a>
                                      <a href="" class="bg-warning  actions">Edit</a>
                                    </td>
                                </tr>
                                 @endforeach

                                </tbody>
                            </table>
                </div>
            </div>

        </div>
    </div>

    </div>
</div>
@endsection
