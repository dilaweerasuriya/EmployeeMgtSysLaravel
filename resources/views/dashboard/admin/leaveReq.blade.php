@extends('dashboard.admin.layouts.admin-dash-layout')

@section('title','Add Leave Types')

<link rel="stylesheet" href="htpps://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

@section('content')
<div class="row justify-content-center">
    <div class="col-md-11">
        <div class="card">
            <h3 class="card-header text-center">{{ __('View Leave Types') }}</h3>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>

            <table class="table table-bordered" id="leaveRequests">
                <tr>
                    <th>Employee Name</th>
                    <th>Leave Type</th>
                    <th>Leave Days</th>
                    <th>Action</th>
                </tr>
                    @foreach($data as $row)

                        <tr>
                            <td></td>
                            <td>{{ $row->leave_type }}</td>
                            <td>{{ $row->leave_days }}</td>
                            <td>
                                <button class="btn btn-success">Approve</button>
                                <button class="btn btn-danger">Reject</button>
                            </td>
                        </tr>

                    @endforeach
            </table>

        </div>
    </div>
</div>

@endsection

@section('script')

<script>
    $(document).ready(function () {
        $('#leaveRequests').DataTable();
    });
</script>

@endsection
