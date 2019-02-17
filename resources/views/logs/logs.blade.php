@extends('layouts.template')

@section('content')
<section>
    <div class="container-fluid my-5">
        <div class="row no-gutters align-items-center my-5">
            <div class="col-md-5">
                <input class="form-control form-control-lg shadow p-3 rounded table-search" type="search" placeholder="Search Call Logs...">
            </div>
            <div class="col-auto">
                <button class="btn btn-lg btn-primary-outline" type="submit">
                    <i class="fas fa-search logo-color"></i>
                </button>
            </div>
        </div>
        <div class="table-responsive shadow p-3 rounded">
            <table class="table table-hover dataresults">
                <thead>
                    <tr>
                        <th scope="col">Log ID</th>
                        <th scope="col">Caller</th>
                        <th scope="col">Operator</th>
                        <th scope="col">Hardware Serial Number</th>
                        <th scope="col">Operating System</th>
                        <th scope="col">Software</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $log)
                    <tr>
                        <td>{{$log->id}}</td>
                        <td>{{$log->caller}}</td>
                        <td>{{$log->operator}}</td>
                        <td>{{$log->hardwareSN}}</td>
                        <td>{{$log->OS}}</td>
                        <td>{{$log->software}}</td>
                        <td>{{$log->created_at}}</td>
                        <td>{{$log->updated_at}}</td>
                        <td>
                            <a href={{route('logs.edit', $log->id)}} class="btn btn-primary-outline">Edit</a>
                        </td>
                        <td>
                            <form action={{ route('logs.destroy', $log->id) }} method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">{{__('Delete')}}</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>            
        <a class="row align-items-right p-3" href={{route('logs.create')}}>
            <button class="btn btn-lg btn-primary-outline" type="button">{{__('New Log')}}</button>
        </a>
    </div>
</section>
@endsection
