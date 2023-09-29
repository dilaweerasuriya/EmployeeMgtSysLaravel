@extends('dashboard.admin.layouts.admin-dash-layout')

@section('title','Add Employees')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <h3 class="card-header text-center">{{ __('Add Employees') }}</h3>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <form method="post" action="{{route('admin.addStaff')}}" enctype="multipart/form-data">
					@csrf
					<div class="row mb-3">
                        <div class="col-sm-1"></div>
				<label class="col-sm-2 col-label-form">First Name</label>
				<div class="col-sm-8">
					<input type="text" name="first_name" class="form-control" placeholder="First Name"/>
				</div>
			</div>

            <div class="row mb-3">
                <div class="col-sm-1"></div>
				<label class="col-sm-2 col-label-form">Last Name</label>
				<div class="col-sm-8">
					<input type="text" name="last_name" class="form-control" placeholder="Last Name"/>
				</div>
			</div>

            <div class="row mb-4">
                <div class="col-sm-1"></div>
				<label class="col-sm-2 col-label-form"> Image</label>
				<div class="col-sm-8">
					<input type="file" name="image" />
				</div>
			</div>

            <div class="row mb-3">
                <div class="col-sm-1"></div>
				<label class="col-sm-2 col-label-form">DOB</label>
				<div class="col-sm-8">
					<input type="date" name="dob" id="dob" class="form-control" placeholder="DOB"/>
				</div>
			</div>

            <div class="row mb-3">
                <div class="col-sm-1"></div>
				<label class="col-sm-2 col-label-form">Age</label>
				<div class="col-sm-8">
					<input type="text" name="age" id="age" class="form-control" placeholder="Age"/>
				</div>
			</div>

            <div class="row mb-4">
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
					<input type="text" name="nic" class="form-control" placeholder="NIC"/>
				</div>
			</div>

            <div class="row mb-3">
                <div class="col-sm-1"></div>
				<label class="col-sm-2 col-label-form">Address</label>
				<div class="col-sm-8">
					<input type="text" name="address" class="form-control" placeholder="Address"/>
				</div>
			</div>

			<div class="row mb-3">
                <div class="col-sm-1"></div>
				<label class="col-sm-2 col-label-form">Email</label>
				<div class="col-sm-8">
					<input type="text" name="email" class="form-control" placeholder="Email"/>
				</div>
			</div>

            <div class="row mb-3">
                <div class="col-sm-1"></div>
				<label class="col-sm-2 col-label-form">Password</label>
				<div class="col-sm-8">
					<input type="password" name="password" class="form-control" placeholder="Password"/>
				</div>
			</div>
			<div class="text-center">
				<input type="submit" style="width: 150px;" class="btn btn-primary" value="Add" />
			</div>
            <br>


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
