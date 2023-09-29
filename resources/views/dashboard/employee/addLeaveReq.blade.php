@extends('dashboard.employee.layouts.employee-dash-layout')

@section('title','Leave Request')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <h3 class="card-header text-center">{{ __('Leave Requests') }}</h3>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <form method="post" action="{{ route('employee.addLeaveReq') }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-2 col-label-form">Leave Type</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="leave_type">
                                    @foreach($data as $item)
                                    {{-- <option value="{{ $item->id }}">{{ $item->leave_type }}</option> --}}
                                        <option value="{{ $item->leave_type }}">{{ $item->leave_type }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-2 col-label-form">Start Date</label>
                        <div class="col-sm-8">
                            <input type="date" name="start_date" id="start_date" class="form-control" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-2 col-label-form">End Date</label>
                        <div class="col-sm-8">
                            <input type="date" name="end_date" id="end_date" class="form-control" />
                        </div>
                    </div>

                    <script>
                        var futureDateInput = document.getElementById("start_date");
                        var futureDateInput2 = document.getElementById("end_date");

                        var currentDate = new Date();

                        currentDate.setDate(currentDate.getDate() + 1);
                        var minDate = currentDate.toISOString().split('T')[0];

                        futureDateInput.setAttribute("min", minDate);
                        futureDateInput2.setAttribute("min", minDate);
                    </script>

                    <div class="row mb-3">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-2 col-label-form">Leave Days</label>
                        <div class="col-sm-8">
                            <input type="text" name="leave_days" id="result" class="form-control" />
                        </div>
                    </div>

                    <script>
                        const startDateInput = document.getElementById("start_date");
                        const endDateInput = document.getElementById("end_date");
                        const resultInput = document.getElementById("result");

                        function calculateWeekdays() {
                            const startDate = new Date(startDateInput.value);
                            const endDate = new Date(endDateInput.value);
                            let weekdays = 0;

                            while (startDate <= endDate) {
                                // Check if the current day is not a weekend (Saturday or Sunday)
                                if (startDate.getDay() !== 0 && startDate.getDay() !== 6) {
                                    weekdays++;
                                }
                                startDate.setDate(startDate.getDate() + 1); // Move to the next day
                            }

                            resultInput.value = weekdays;
                        }

                        startDateInput.addEventListener("input", calculateWeekdays);
                        endDateInput.addEventListener("input", calculateWeekdays);

                        // Calculate weekdays initially when the page loads
                        calculateWeekdays();
                    </script>


                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="Request" />
                    </div>
                    <br>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
