@extends('dashboard.admin.layouts.admin-dash-layout')

@section('title','View Employees')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <h3 class="card-header text-center">{{ __('View Employees') }}</h3>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: "{{ $message }}",
                                timer: 2000 // Adjust the duration you want the alert to be visible
                            });
                        </script>
                    @endif

                    @if ($message = Session::get('error'))
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: "{{ $message }}",
                                timer: 2000 // Adjust the duration you want the alert to be visible
                            });
                        </script>
                    @endif
                </div>

                <table style="border-collapse: collapse; width: 90%; margin-left:5%;" class="table table-bordered" id="employeeList">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
				    @foreach($data as $row)
                        <tbody>
                            <tr>
                                <td><img src="{{ asset('images/' . $row->image) }}" width="75" /></td>
                                <td>{{ $row->first_name . ' ' . $row->last_name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->age }}</td>
                                <td>{{ $row->gender }}</td>
                                <td>
                                    @if(Auth()->user()->status==1)
                                        <span class="badge badge-success">Active</span>
                                    @elseif(Auth()->user()->status==2)
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <form method="post" action="{{ route('admin.deleteStaff', $row->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('admin.editStaff', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <input type="submit" class="btn btn-danger btn-sm" value="Delete" />
                                    </form>

                                </td>
                            </tr>
                        </tbody>

				    @endforeach
		        </table>

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    $(document).ready(function () {
        $('#employeeList').DataTable();
    });
</script>

@endsection
