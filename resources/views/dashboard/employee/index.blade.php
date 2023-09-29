@extends('dashboard.employee.layouts.employee-dash-layout')

@section('title','Dashboard')

@section('content')

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="row ml-3">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
            <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
@endsection
