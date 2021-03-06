@extends('layouts.template')

@section('content')
<section>
    <div class="table-responsive shadow p-3 rounded">
        <table id="resultsTable" class="table table-hover dataresults">
            <thead>
                <tr>
                    <th scope="col">Log ID</th>
                    <th scope="col">Case ID</th>
                    <th scope="col">Employee ID</th>
                    <th scope="col">Operator</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">View & Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                <tr>
                    <td>{{$log->id}}</td>
                    <td>{{$log->caseid}}</td>
                    <td>{{$log->callerid}}</td>
                    <td>{{$log->operator}}</td>
                    <td>{{$log->reason}}</td>
                    <td>{{$log->created_at}}</td>
                    <td>{{$log->updated_at}}</td>
                    <td>
                        <button type="button" class="btn btn-primary-outline" data-toggle="modal" data-target="#formModal{{ $log->id }}"
                            data-value="{{$log->id}}">View</button>
                    </td>
                </tr>
                <div class="modal fade" tabindex="-1" role="dialog" id="formModal{{ $log->id }}">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Call Log ID: {{ $log->id }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action={{route('logs.update', $log->id)}}>
                                @csrf
                                @method('PATCH')
                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputcallerid">Case ID</label>
                                            <input type="text" class="form-control" id="inputcallerid" name="caseid"
                                                value="{{ $log->caseid }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputcallerid">Employee ID</label>
                                            <input type="text" class="form-control" id="inputcallerid" name="callerid"
                                                value="{{ $log->callerid }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputOperator">Operator</label>
                                            <input type="text" class="form-control" id="inputOperator" name="operator"
                                                value="{{ $log->operator }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputHardwareSN">Hardware Serial Number</label>
                                        <input id="inputHardwareSN" class="form-control" name="hardwareSN" type="text"
                                            value="{{ $log->hardwareSN }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputOS">Operating System</label>
                                        <input id="inputOS" class="form-control" name="OS" type="text" value="{{ $log->OS }}">
                                    </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputSoftware">Software</label>
                                        <input id="inputSoftware" class="form-control" name="software" type="text"
                                            value="{{ $log->software }}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputReason">Reason</label>
                                        <input id="inputReason" class="form-control" name="reason" type="text" value="{{ $log->reason }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary-outline">Save changes</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
    <a class="row align-items-right p-3" href={{route('logs.create')}}>
        <button class="btn btn-lg btn-primary-outline" type="button">{{__('New Log')}}</button>
    </a>
</section>
@endsection
