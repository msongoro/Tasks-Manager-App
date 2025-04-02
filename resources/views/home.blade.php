@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Sidebar -->
     @extends('layouts.sidebar')

    <!-- Page Content -->
    <div class="content">
        <div class="row mt-2 mr-40 px-8">
            <h2 class="py-4 text-xl font-bold text-gray-950">Dashboard</h2>
            <div class="col-md-6">
                <div class="card text-dark mb-3" style="background-color: #ffffff">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <h5 class="card-title text-gray-950 font-bold text-md">Total Users</h5>
                            <p class="card-text fs-2">{{ $users->count()}}</p>
                        </div>
                        <span class="mdi mdi-account-group text-gray-950 font-extrabold" style="font-size: 45px;"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-dark mb-3" style="background-color: #ffffff">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <h5 class="card-title text-gray-950 font-bold text-md">Total Projects</h5>
                            <p class="card-text fs-2">{{ $projects->count() }}</p>
                        </div>
                        <span class="mdi mdi-folder text-purple-500 font-extrabold" style="font-size: 45px;"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-dark  mb-3" style="background-color: #ffffff">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <h5 class="card-title text-gray-950 font-bold text-md">Tasks List</h5>
                            <p class="card-text fs-2">{{ $tasks->count() }}</p>
                        </div>
                        <span class="mdi mdi-format-list-bulleted text-orange-500 font-bold" style="font-size: 45px;"></span>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card text-dark  mb-3" style="background-color: #ffffff">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <h5 class="card-title text-gray-950 font-bold text-md">Completed Task</h5>
                            <p class="card-text fs-2">{{ $tasks->where('status','completed')->count() }}</p>
                        </div>
                        <span class="mdi mdi-check-circle-outline text-green-500 font-extrabold" style="font-size: 45px;"></span>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card text-dark  mb-3" style="background-color: #ffffff">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <h5 class="card-title text-gray-950 font-bold text-md">Pending Task</h5>
                            <p class="card-text fs-2">{{ $tasks->where('status','pending')->count() }}</p>
                        </div>
                        <span class="mdi mdi-clock-outline font-extrabold" style="font-size: 45px; color:rgb(255, 5, 5);"></span>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card text-dark  mb-3" style="background-color: #ffffff">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <h5 class="card-title text-gray-950 font-bold text-md">Active Task</h5>
                            <p class="card-text fs-2">{{ $tasks->where('status','in_progress')->count() }}</p>
                        </div>
                        <span class="mdi mdi-progress-clock text-blue-500 font-extrabold" style="font-size: 45px;"></span>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card text-dark  mb-3" style="background-color: #ffffff">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <h5 class="card-title text-gray-950 font-bold text-md">High Priority Task</h5>
                            <p class="card-text fs-2">{{ $tasks->where('priority','high')->count() }}</p>
                        </div>
                        <span class="mdi mdi-progress-clock text-red-600 font-extrabold" style="font-size: 45px;"></span>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="card text-dark  mb-3" style="background-color: #ffffff">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <h5 class="card-title text-gray-950 font-bold text-md">Medium Priority Task</h5>
                            <p class="card-text fs-2">{{ $tasks->where('priority','medium')->count() }}</p>
                        </div>
                        <span class="mdi mdi-progress-clock text-yellow-400 font-extrabold" style="font-size: 45px;"></span>
                    </div>
                </div>
            </div>

        </div>
        <canvas id="tasksChart" class="w-20 h-20"></canvas>
    </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const ctx = document.getElementById("tasksChart").getContext("2d");

            const taskData = @json($tasksCount); // Convert Laravel data to JavaScript

            new Chart(ctx, {
                type: "bar", // Change to "pie" or "line" if needed
                data: {
                    labels: Object.keys(taskData), // Task statuses (e.g., pending, in-progress, complete)
                    datasets: [{
                        label: "Task Status",
                        data: Object.values(taskData), // Task count
                        backgroundColor: ["#f39c12", "#3498db", "#2ecc71"], // Colors for different statuses
                        borderWidth: 0.2,
                    }]
                },

                options: {
                    responsive: true,
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        });
    </script>

</div>
@endsection
