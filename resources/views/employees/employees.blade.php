@extends('layouts.template')

@section('content')

<section>
    <div class="table-responsive shadow p-3 rounded">
        <table id="resultsTable" class="table table-hover dataresults">
            <thead>
                <tr>
                    <th scope="col">Employee ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Job Title</th>
                    <th scope="col">Department</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr>
                    <td>{{$employee->id}}</td>
                    <td>{{$employee->fname}}</td>
                    <td>{{$employee->sname}}</td>
                    <td>{{$employee->jobTitle}}</td>
                    <td>{{$employee->department}}</td>
                    <td>{{$employee->telephone}}</td>
                    <td>
                        <button type="button" class="btn btn-primary-outline" data-toggle="modal" data-target="#formModal{{ $employee->id }}"
                            data-value="{{$employee->id}}">View</button>
                    </td>
                    <td>
                        <form action={{ route('employees.destroy', $employee->id) }} method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">{{__('Delete')}}</button>
                        </form>
                    </td>
                </tr>
                <div class="modal fade" tabindex="-1" role="dialog" id="formModal{{ $employee->id }}">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Employee ID: {{ $employee->id }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action={{route('employees.update', $employee->id)}}>
                                @method('PATCH')
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group col-md-12">
                                        <label for="inputFname">Forename</label>
                                        <input id="inputFname" class="form-control" name="fname" type="text" value={{ $employee->fname }}>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputSurname">Surname</label>
                                        <input type="text" class="form-control" id="inputSurname" name="sname" value={{ $employee->sname }}>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputJobTitle">Job Title</label>
                                        <input id="inputJobTitle" class="form-control" name="jobTitle" type="text"
                                            value={{ $employee->jobTitle }}>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputDepartment">Department</label>
                                        <input id="inputDepartment" class="form-control" name="department" type="text"
                                            value={{ $employee->department }}>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputTelephone">Telephone</label>
                                        <input id="inputTelephone" class="form-control" name="telephone" type="text"
                                            value={{ $employee->telephone }}>
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
    <a class="row align-items-right p-3" href={{route('employees.create')}}>
        <button class="btn btn-lg btn-primary-outline" type="button">{{__('New Employee')}}</button>
    </a>
</section>
@endsection
