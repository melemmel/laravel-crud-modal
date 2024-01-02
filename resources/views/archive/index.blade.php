@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="container mt-5">
            <h1>Student's Archive</h1>
        </div>

        <div class="container">
            <div class="table-responsive">
                <table class="table table-striped" id="student">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Department</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <th scope="row">{{ $student->id }}</th>
                                <td>{{ ucwords($student->first_name) }}</td>
                                <td>{{ ucwords($student->last_name) }}</td>
                                <td>{{ $student->zone_street }}, {{ $student->barangay }}, {{ $student->municipality }}
                                </td>
                                <td>{{ \Carbon\Carbon::parse($student->date_of_birth)->format('d, F Y') }}</td>
                                <td>{{ $student->department }}</td>
                                <td>
                                    <!-- Restore Button -->
                                    <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdropDelete{{ $student->id }}">
                                        <i class="bi bi-person-minus"></i> Archive
                                    </button>

                                    <div class="modal fade" id="staticBackdropDelete{{ $student->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Delete Student</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to restore this student
                                                        <strong>{{ $student->first_name }}</strong>?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('student.restore', $student->id) }}"
                                                        method="POST">
                                                        @method('PATCH')
                                                        @csrf
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Restore</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-flash-message />
    <script>
        // Wait for the document to be ready
        $('#student').DataTable();
    </script>
@endsection
