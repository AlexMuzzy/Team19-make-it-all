@extends('layouts.template')

@section('content')
<section>
    <div class="table-responsive shadow p-3 rounded">
        <table id="resultsTable" class="table table-hover dataresults">
            <thead>
                <tr>
                    <th scope="col">Hardware ID</th>
                    <th scope="col">Hardware</th>
                    <th scope="col">Hardware Serial</th>
                    <th scope="col">Type</th>
                    <th scope="col">Vendor</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hardware as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->hardware}}</td>
                    <td>{{$row->hardwareSN}}</td>
                    <td>{{$row->type}}</td>
                    <td>{{$row->vendor}}</td>
                    <td>
                        <button type="button" class="btn btn-primary-outline" data-toggle="modal" data-target="#formModal{{ $row->id }}"
                            data-value="{{$row->id}}">View</button>
                    </td>
                    <td>
                        <form action={{ route('hardware.destroy', $row->id) }} method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">{{__('Delete')}}</button>
                        </form>
                    </td>
                </tr>
                <div class="modal fade" tabindex="-1" role="dialog" id="formModal{{ $row->id }}">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Hardware ID: {{ $row->id }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action={{route('hardware.update', $row->id)}}>
                                @method('PATCH')
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group col-md-12">
                                        <label for="inputHardware">Hardware Name</label>
                                        <input type="text" class="form-control" id="inputHardware" name="hardware"
                                            value="{{ $row->hardware }}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputHardwareSN">Hardware Serial</label>
                                        <input id="inputHardwareSN" class="form-control" name="hardwareSN" type="text"
                                            value="{{ $row->hardwareSN }}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputType">Type</label>
                                        <input type="text" class="form-control" id="inputType" name="type" value="{{ $row->type }}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputVendor">Vendor</label>
                                        <input id="inputVendor" class="form-control" name="vendor" type="text" value="{{ $row->vendor }}">
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
    <a class="row align-items-right p-3" href={{route('hardware.create')}}>
        <button class="btn btn-lg btn-primary-outline" type="button">{{__('New Hardware')}}</button>
    </a>
</section>
@endsection
