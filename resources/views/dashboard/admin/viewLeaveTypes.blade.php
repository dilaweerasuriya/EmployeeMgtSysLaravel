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

            <table style="border-collapse: collapse; width: 90%; margin-left:5%;" class="table table-bordered" id="leaveTypes">
                <thead>
                <tr>
                    <th>Leave Type</th>
                    <th>Leave Days</th>
                    <th>Action</th>
                </tr>
                </thead>
                    @foreach($data as $row)
                    <tbody>
                        <tr>
                            <td>{{ $row->leave_type }}</td>
                            <td>{{ $row->leave_days }}</td>
                            <td>
                                <form method="post" action="{{ route('admin.deleteLeaveType', $row->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.editLeaveType', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
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

@endsection

@section('script')

<script>
    $(document).ready(function () {
        $('#leaveTypes').DataTable();
    });
</script>

@endsection
