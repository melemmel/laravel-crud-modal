@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Age</th>
                        <th scope="col">Department</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Juan</td>
                        <td>Dela Cruz</td>
                        <td>Hello World, Philippines</td>
                        <td>22</td>
                        <td>CCS</td> 
                        <td><button class="btn btn-warning">Edit</button></td> 
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
