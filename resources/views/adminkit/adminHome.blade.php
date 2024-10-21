@extends('adminkit.layouts.app')
@section('content')
@section('title')
    Admin Dashboard
@endsection
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="container">
                    <div class="container text-center">



                        <div class="container mt-5 ">
                            <h2 class="mb-4">Managment DashBoard</h2>

                            <!-- إحصائيات لوحة التحكم -->
                            <div class="row">
                                <div class="col-md-6 col-xl-4">
                                    <div class="card bg-info text-white mb-4">
                                        <div class="card-body">
                                            <p style="font-size: 20px">Number Of Booked Rooms:</p><span id="rooms-count"
                                                style="font-size: 50px">{{ $roomnum }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="card bg-danger text-white mb-4">
                                        <div class="card-body">
                                            <p style="font-size: 20px">Avaiable Rooms:</p><span id="rooms-count"
                                                style="font-size: 50px">{{ count($rooms) }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body">
                                            <p style="font-size: 20px">Total Income: </p><span id="income"
                                                style="font-size: 50px">{{ $income }}$</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- جدول الغرف -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table mr-1"></i>
                                    Rooms Tabel
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="roomsTable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Pictures</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Cost</th>
                                                    <th scope="col">Area</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($confirmedReservations as $confirmedReservation)
                                                    <tr>
                                                        <td>
                                                            <img src="../storage/uploadimg/{{ $confirmedReservation->room->filename }}"
                                                                alt="{{ $confirmedReservation->name }}"
                                                                style="object-fit: cover; height: 80px; width: 200px;">
                                                        </td>
                                                        <td>{{ $confirmedReservation->room->name }}</td>
                                                        <td>{{ $confirmedReservation->room->price }}</td>
                                                        <td>{{ $confirmedReservation->room->area }}</td>
                                                        <td>
                                                            <h1 class="btn btn-danger">Booked</h1>
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

            </div>
        </div>
    </div>
@endsection
