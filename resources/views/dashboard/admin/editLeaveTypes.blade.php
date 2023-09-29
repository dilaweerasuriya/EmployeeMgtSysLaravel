@extends('dashboard.admin.layouts.admin-dash-layout')

@section('title','Add Leave Types')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <h3 class="card-header text-center">{{ __('Add Leaves Types') }}</h3>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>

            <form method="post" action="{{ route('admin.updateLeaveType', $addLeaves->id) }}">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-sm-1"></div>
                    <label class="col-sm-2 col-label-form">Leave Type</label>
                    <div class="col-sm-8">
                        <input type="text" name="leave_type" class="form-control" value="{{ $addLeaves->leave_type }}"/>
                    </div>
                </div>
    
                <div class="row mb-3">
                    <div class="col-sm-1"></div>
                    <label class="col-sm-2 col-label-form">Leave Days</label>
                    <div class="col-sm-8">
                        <input type="text" name="leave_days" class="form-control" value="{{ $addLeaves->leave_days }}" />
                    </div>
                </div>
    
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Update" />
                </div>
                <br>
            </form>

        </div>
    </div>
</div>

@endsection
