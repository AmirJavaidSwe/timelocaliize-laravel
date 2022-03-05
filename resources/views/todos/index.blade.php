@extends('layouts.app')
@section('title', 'To Do List')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid  mt-3">
                <div class="row mb-2">
                    <div class="col-sm-12 col-md-6">
                        <h1 class="m-0">@yield('title')</h1>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <a href="{{ route('todos.create') }}" class="btn btn-success float-md-right"><i class="fa fa-plus"></i>Add Todo Item</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th width="100">#</th>
                                            <th>Title</th>
                                            <th>Deadline UTC</th>
                                            <th>Deadline (User Timezone)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($todos as $todo)
                                            <tr>
                                                <td>{{ request()->page > 1 ? (request()->page*10)+(++$loop->index) : ++$loop->index }}</td>
                                                <td>{{ $todo->title }}</td>
                                                <td>{{ Carbon\Carbon::parse($todo->deadline)->format('M j, Y h:i:s A') }}
                                                <td>{{ Carbon\Carbon::parse($todo->deadline)->timezone(geoip(geoip()->getClientIP())['timezone'])->format('M j, Y h:i:s A') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-tools mt-2 pr-3">
                                <ul class="pagination pagination-sm float-right">
                                    {{ $todos->onEachSide(5)->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
