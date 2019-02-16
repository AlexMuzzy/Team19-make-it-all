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
        <form method="POST" action="{{route('cases.store')}}">
            @csrf
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
                    <input id="inputCategory" class="form-control" name="category" type="text">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputIssue">Issue</label>
                    <input id="inputIssue" class="form-control" name="issue" type="text">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPriority">Priority</label>
                    <input id="inputPriority" class="form-control" name="priority" type="text">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputSolved">Solved</label>
                    <input id="inputSolved" class="form-control" name="solved" type="text">
                </div>
            </div>
            <div class="form-group">
                <label for="inputSummary">Summary</label>
                <input type="text" class="form-control" id="inputSummary" name="summary">
            </div>
            <button type="submit" class="btn btn-lg btn-primary-outline">Submit</button>
        </form>
    </div>
</section>
@endsection
