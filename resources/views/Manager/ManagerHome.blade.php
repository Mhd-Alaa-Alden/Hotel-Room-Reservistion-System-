@extends('Manager.layouts.app')
@section('content')
@section('title')
    Manager Dashboard
@endsection
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="container">
                    <div class="container text-center">
                        <div class="container mt-5 ">
                            <h2 class="mb-4">Manager DashBoard</h2>

                            <!-- جدول الغرف -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table mr-1"></i>
                                    Admins Tabel
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="roomsTable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Pictures</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>
                                                            <img src="../storage/uploadimg/{{ $user->filename }}"
                                                                alt="{{ $user }}"
                                                                style="object-fit: cover; height: 80px; width: 200px;">
                                                        </td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
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

            </div>
        </div>
    </div>
@endsection
