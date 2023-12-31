@extends('layouts.app')

@section('content')
    <div class="container mt-5">
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
        <div class="container mt-5">
            <h1>Students</h1>
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <i class="bi bi-person-plus"></i> Add Student
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add Student</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('student.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                        id="first_name" name="first_name" value="{{ old('first_name') }}" required
                                        autocomplete="given-name">
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                        id="last_name" name="last_name" value="{{ old('last_name') }}" required
                                        autocomplete="family-name">
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="municipality" class="form-label" id="municipalityLabel">Municipality</label>
                                    <select class="form-control @error('municipality') is-invalid @enderror"
                                        id="municipality" name="municipality" required>
                                        <!-- Options will be dynamically populated by your script -->
                                    </select>
                                    @error('municipality')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="barangay" class="form-label" id="barangayLabel">Barangay</label>
                                    <select class="form-control" id="barangay" name="barangay" required>

                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                        id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required
                                        autocomplete="date_of_birth">
                                    @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="department" class="form-label">Department</label>
                                    <select class="form-control @error('department') is-invalid @enderror" id="department"
                                        name="department" required>
                                        <option value="" disabled selected>Select Department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department }}"
                                                {{ old('department') == $department ? 'selected' : '' }}>
                                                {{ $department }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('department')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                @if ($errors->has('general'))
                                    <div class="text-danger">{{ $errors->first('general') }}</div>
                                @endif

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

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
                                <td>{{ $student->barangay }}, {{ $student->municipality }}</td>
                                <td>{{ \Carbon\Carbon::parse($student->date_of_birth)->format('d, F Y') }}</td>
                                <td>{{ $student->department }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning mb-2" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdropEdit{{ $student->id }}">
                                        <i class="bi bi-person-plus"></i> Edit
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdropEdit{{ $student->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Student</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('student.update', $student->id) }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="first_name" class="form-label">First Name</label>
                                                            <input type="text"
                                                                class="form-control @error('first_name') is-invalid @enderror"
                                                                id="first_name" name="first_name"
                                                                value="{{ $student->first_name }}" required
                                                                autocomplete="given-name">
                                                            @error('first_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="last_name" class="form-label">Last Name</label>
                                                            <input type="text"
                                                                class="form-control @error('last_name') is-invalid @enderror"
                                                                id="last_name" name="last_name"
                                                                value="{{ $student->last_name }}" required
                                                                autocomplete="family-name">
                                                            @error('last_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        {{-- <div class="mb-3">
                                                            <label for="municipality" class="form-label"
                                                                id="municipalityLabel">Municipality</label>
                                                            <select
                                                                class="form-control @error('municipality') is-invalid @enderror"
                                                                id="municipality" name="municipality" required>
                                                                <!-- Options will be dynamically populated by your script -->
                                                            </select>
                                                            @error('municipality')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="barangay" class="form-label"
                                                                id="barangayLabel">Barangay</label>
                                                            <select class="form-control" id="barangay" name="barangay"
                                                                required>
                                                                <!-- Options will be dynamically populated by your script -->
                                                            </select>
                                                        </div> --}}

                                                        <div class="mb-3">
                                                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                                                            <input type="date"
                                                                class="form-control @error('date_of_birth') is-invalid @enderror"
                                                                id="date_of_birth" name="date_of_birth"
                                                                value="{{ $student->date_of_birth }}" required autocomplete="date_of_birth">
                                                            @error('date_of_birth')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="department" class="form-label">Department</label>
                                                            <select
                                                                class="form-control @error('department') is-invalid @enderror"
                                                                id="department" name="department" required>
                                                                <option value="" disabled>Select Department</option>
                                                                @foreach ($departments as $dept)
                                                                    <option value="{{ $dept }}"
                                                                        {{ $student->department == $dept ? 'selected' : '' }}>
                                                                        {{ $dept }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('department')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        @if ($errors->has('general'))
                                                            <div class="text-danger">{{ $errors->first('general') }}</div>
                                                        @endif

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                Changes</button>
                                                        </div>
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

        $(document).ready(function() {
            @if ($errors->any())
                // If there are errors, show the modal
                $('#staticBackdrop').modal('show');
            @endif
        });
    </script>

    @push('scripts')
        <script src="{{ asset('datatables/jquery-3.7.0.js') }}"></script>
        <script>
            $(document).ready(function() {
                fetchData();

                $('#municipality').on('change', function() {
                    var selectedMunicipalityOption = $(this).find(':selected');
                    var selectedMunicipalityCode = selectedMunicipalityOption.data('municipality-id');
                    if (selectedMunicipalityCode) {
                        $.ajax({
                            url: 'https://psgc.gitlab.io/api/cities-municipalities/' +
                                selectedMunicipalityCode + '/barangays/',
                            method: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                // Empty the existing barangay dropdown before populating
                                $('#barangay').empty().append(
                                    '<option value="" disabled selected>Select Barangay</option>'
                                );

                                // Iterate through the API response and populate the dropdown
                                $.each(data, function(index, barangay) {
                                    $('#barangay').append('<option value="' + barangay
                                        .name + '" data-brgy-id="' + barangay.code +
                                        '">' + barangay.name + '</option>');
                                });
                            },
                            error: function(error) {
                                console.error('Error fetching data:', error);
                            }
                        });
                    } else {
                        // If no municipality is selected, empty the barangay dropdown
                        $('#barangay').empty();
                    }
                });
            });

            function fetchData() {
                $.ajax({
                    url: 'https://psgc.gitlab.io/api/provinces/051700000/cities-municipalities/',
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Empty the existing municipality dropdown before populating
                        $('#municipality').append(
                            '<option value="" disabled selected>Select Municipality</option>');

                        // Iterate through the API response and populate the dropdown
                        $.each(data, function(index, municipality) {
                            $('#municipality').append('<option value="' + municipality.name +
                                '" data-municipality-id="' + municipality.code + '">' + municipality
                                .name + '</option>');
                        });
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }
        </script>
    @endpush
@endsection
