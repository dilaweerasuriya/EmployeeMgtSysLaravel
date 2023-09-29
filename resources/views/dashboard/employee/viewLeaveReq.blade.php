@extends('dashboard.employee.layouts.employee-dash-layout')

@section('title','Leave History')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <h3 class="card-header text-center">{{ __('Leave History') }}</h3>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
