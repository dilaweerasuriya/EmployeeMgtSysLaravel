@extends('dashboard.admin.layouts.admin-dash-layout')

@section('title','Edit Employees')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <h3 class="card-header text-center">{{ __('Edit Employees') }}</h3>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <form method="post" action="{{ route('admin.updateStaff', $employee->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-2 col-label-form">First Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="first_name" class="form-control" value="{{ $employee->first_name }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-2 col-label-form">Last Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="last_name" class="form-control" value="{{ $employee->last_name }}" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-2 col-label-form">Image</label>
                        <div class="col-sm-8">
                            <input type="file" name="image" />
                            <br />
                            <img src="{{ asset('images/' . $employee->image) }}" width="100" class="img-thumbnail" />
                            <input type="hidden" name="hidden_image" value="{{ $employee->image }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-2 col-label-form">DOB</label>
                        <div class="col-sm-8">
                            <input type="date" name="dob" id="dob" class="form-control" value="{{ $employee->dob }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-2 col-label-form">Age</label>
                        <div class="col-sm-8">
                            <input type="text" name="age" id="age" class="form-control" value="{{ $employee->age }}"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-2 col-label-form">Gender</label>
                            <div class="col-sm-8">
                                <select name="gender" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                    <div class="row mb-3">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-2 col-label-form">NIC</label>
                        <div class="col-sm-8">
                            <input type="text" name="nic" class="form-control" value="{{ $employee->nic }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-2 col-label-form">Address</label>
                        <div class="col-sm-8">
                            <input type="text" name="address" class="form-control" value="{{ $employee->address }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-2 col-label-form">Email</label>
                        <div class="col-sm-8">
                            <input type="text" name="email" class="form-control" value="{{ $employee->email }}" disabled/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-2 col-label-form">Password</label>
                        <div class="col-sm-8">
                            <input type="password" name="password" class="form-control" value="{{ $employee->password }}" disabled />
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="hidden" name="hidden_id" value="{{ $employee->id }}" />
                        <input type="submit" class="btn btn-primary" value="Update" />
                    </div>
                    <br>

                        <script>
                            document.getElementsByName('gender')[0].value = "{{ $employee->gender }}";
                        </script>

                        <script>
                            // Get references to the date of birth and age input fields
                            const dobInput = document.getElementById('dob');
                            const ageInput = document.getElementById('age');
    
                            // Add an input event listener to the date of birth input field
                            dobInput.addEventListener('input', function () {
                                // Get the date of birth from the input field
                                const dobString = dobInput.value;
    
                                // Create a Date object from the input
                                const dob = new Date(dobString);
    
                                // Get the current date
                                const currentDate = new Date();
    
                                // Calculate the difference in milliseconds
                                const ageInMilliseconds = currentDate - dob;
    
                                // Calculate the age in years
                                const ageInYears = Math.floor(ageInMilliseconds / (365 * 24 * 60 * 60 * 1000));
    
                                // Update the age input field
                                ageInput.value = ageInYears;
                            });
                        </script>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection