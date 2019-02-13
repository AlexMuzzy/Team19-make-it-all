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
        <form method="POST" action="{{route('logs.store')}}">
            @csrf
            <div class="col-md-6 float-md-left">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputForename">First Name</label>
                        <input type="text" class="form-control" id="inputForename" name="fname">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputSurname">Surname</label>
                        <input type="text" class="form-control" id="inputSurname" name="sname">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCategory">Category</label>
                        <select id="inputCategory" class="form-control" name="category">
                            <option selected>Choose...</option>
                            <option>Software</option>
                            <option>Hardware</option>
                            <option>Networking</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputIssue">Issue</label>
                        <select id="inputIssue" class="form-control" name="issue">
                            <option selected>Choose...</option>
                            <option>Computer</option>
                            <option>Screen</option>
                            <option>Peripherals</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPriority">Priority</label>
                        <select id="inputPriority" class="form-control" name="priority">
                            <option selected>Choose...</option>
                            <option>Low</option>
                            <option>Medium</option>
                            <option>Urgent</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputSolved">Solved</label>
                        <select id="inputSolved" class="form-control" name="solved">
                            <option selected>No</option>
                            <option>Yes</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSummary">Summary</label>
                    <input type="text" class="form-control" id="inputSummary" name="summary">
                </div>
                <button type="submit" class="btn btn-lg btn-primary-outline">Submit</button>
            </div>
            <div class="col-md-6 float-md-left">
                <div class="form-group">
                    <label for="inputDescription">Description</label>
                    <textarea class="form-control" id="inputDescription" rows="12" name="description"></textarea>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
