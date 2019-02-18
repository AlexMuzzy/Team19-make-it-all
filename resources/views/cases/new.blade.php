<?php
    $employees = DB::table('employees')->pluck('id');
?>

@extends('layouts.template')

@section('content')
<script>
    var employees = <?php echo $employees ?>;
    console.log(employees);

</script>

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
                <div class="form-group col-md-4">
                    <label for="inputForename">Employee ID</label>
                    <input type="text" class="form-control" id="inputForename" name="employeeID">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputSurname">First Name</label>
                    <input type="text" class="form-control" id="inputSurname" name="fname">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputSurname">Surname</label>
                    <input type="text" class="form-control" id="inputSurname" name="sname">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCategory">Category</label>
                    <select id="inputCategory" class="form-control" name="category">
                        <option disabled selected>Choose...</option>
                        <option value="Software">Software</option>
                        <option value="Hardware">Hardware</option>
                        <option value="Networking">Networking</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputIssue">Issue</label>
                    <input id="inputIssue" class="form-control" name="issue">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPriority">Priority</label>
                    <select id="inputPriority" class="form-control" name="priority">
                        <option disabled selected>Choose...</option>
                        <option value="1">Low</option>
                        <option value="2">Medium</option>
                        <option value="3">Urgent</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputSolved">Solved</label>
                    <select id="inputSolved" class="form-control" name="solved">
                        <option disabled selected>Choose...</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
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
