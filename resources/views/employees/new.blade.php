@extends('layouts.template')

@section('content')
<section>
    <div class="container my-5">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="POST" action="{{route('employees.store')}}">
            @csrf
            <div class="form-group col-md-12">
                <label for="inputFname">Forename</label>
                <input id="inputFname" class="form-control" name="fname" type="text">
            </div>
            <div class="form-group col-md-12">
                <label for="inputSurname">Surname</label>
                <input type="text" class="form-control" id="inputSurname" name="sname">
            </div>
            <div class="form-group col-md-12">
                <label for="inputJobTitle">Job Title</label>
                <input id="inputJobTitle" class="form-control" name="jobTitle" type="text">
            </div>
            <div class="form-group col-md-12">
                <label for="inputDepartment">Department</label>
                <input id="inputDepartment" class="form-control" name="department" type="text">
            </div>
            <div class="form-group col-md-12">
                <label for="inputTelephone">Telephone</label>
                <input id="inputTelephone" class="form-control" name="telephone" type="text">
            </div>
            <button type="submit" class="btn btn-lg btn-primary-outline">Submit</button>
        </form>
    </div>
</section>
@endsection
