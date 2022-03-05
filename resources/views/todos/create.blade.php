@extends('layouts.app')
@section('title', 'Create To Do Item')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid  mt-3">
                <div class="row mb-2">
                    <div class="col-sm-12 col-md-6">
                        <h1 class="m-0">@yield('title')</h1>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <a href="{{ route('todos.index') }}" class="btn btn-success float-md-right"><i
                                class="fa fa-arrow-left"></i>Back to List</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card card-primary card-outline">
                            <form action="{{ route('todos.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="todo_title">Todo Title</label>
                                        <input type="text" class="form-control" name="title" id="todo_title"
                                            placeholder="Enter todo title" maxlength="255">
                                    </div>
                                    <div class="form-group">
                                        <label for="picker">
                                            Deadline (In Local Time) <i class="fa fa-question-circle" data-toggle="tooltip"
                                                title="Deadline In Local Time means, this is te deadline of the task according to your local time, user in different Region/Timezone will see this deadline according to his time."></i>
                                        </label>
                                        <div id="picker"></div>
                                        <input type="hidden" id="result" name="deadline" value="">
                                        <div class="w-50 mt-2 p-3" style="background-color: rgb(248, 246, 246);">
                                            <span class="helper-text text-gray">
                                                Deadline In Local Time means, this is te deadline of the task according to
                                                your local time, user in different Region/Timezone will see this deadline
                                                according to his time.
                                            </span>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/datetimepicker.css') }}">
    <style>
        input[readonly].datetimeInput {
            background-color: transparent;
        }

    </style>
@endsection
@section('scripts')
    <script src="{{ asset('js/datetimepicker.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>
    <script>
        $('#picker').dateTimePicker({
            dateFormat: "YYYY-MM-DD hh:mm A",
            selectData: "now",
            positionShift: {
                top: 0,
                left: 0
            },
            title: "Select Date and Time",
            buttonTitle: "Select"
        });
    </script>
@endsection
