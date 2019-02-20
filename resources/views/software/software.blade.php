@extends('layouts.template')

@section('content')
<section>
    <div class="table-responsive shadow p-3 rounded">
        <table id="resultsTable" class="table table-hover dataresults">
            <thead>
                <tr>
                    <th scope="col">Software ID</th>
                    <th scope="col">Software Name</th>
                    <th scope="col">Supported?</th>
                    <th scope="col">Licensed?</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($software as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->software}}</td>
                    <td>{!! $row['supported'] ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>' !!}</td>
                    <td>{!! $row['licensed'] ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>' !!}</td>
                    <td>
                        <button type="button" class="btn btn-primary-outline" data-toggle="modal" data-target="#formModal{{ $row->id }}"
                            data-value="{{$row->id}}">View</button>
                    </td>
                    <td>
                        <form action={{ route('software.destroy', $row->id) }} method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <div class="modal fade" tabindex="-1" role="dialog" id="formModal{{ $row->id }}">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Software ID: {{ $row->id }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action={{route('software.update', $row->id)}}>
                                @csrf
                                @method('PATCH')
                                <div class="modal-body">
                                    <div class="form-group col-md-12">
                                        <label for="inputSoftware">Software Name</label>
                                        <input type="text" class="form-control" id="inputSoftware" name="software"
                                            value="{{ $row->software }}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputSupported">Supported?</label>
                                        <input id="inputSupported" class="form-control" name="supported" type="text"
                                            value={{ $row['supported'] ? 'Yes' : 'No' }}>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputLicensed">Licensed?</label>
                                        <input id="inputLicensed" class="form-control" name="licensed" type="text"
                                            value={{ $row['licensed'] ? 'Yes' : 'No' }}>
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
    <a class="row align-items-right p-3" href={{route('software.create')}}>
        <button class="btn btn-lg btn-primary-outline" type="button">{{__('New Software')}}</button>
    </a>
</section>
@endsection
