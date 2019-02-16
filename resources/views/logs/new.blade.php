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
            <div class="form-group col-md-12">
                <label for="inputCaller">Caller</label>
                <input type="text" class="form-control" id="inputCaller" name="caller">
            </div>
            <div class="form-group col-md-12">
                <label for="inputOperator">Operator</label>
                <input type="text" class="form-control" id="inputOperator" name="operator">
            </div>
            <div class="form-group col-md-12">
                <label for="inputHardwareSN">Hardware Serial Number</label>
                <input id="inputHardwareSN" class="form-control" name="hardwareSN" type="text">
            </div>
            <div class="form-group col-md-12">
                <label for="inputOS">Operating System</label>
                <input id="inputOS" class="form-control" name="OS" type="text">
            </div>
            <div class="form-group col-md-12">
                <label for="inputSoftware">Software</label>
                <input id="inputSoftware" class="form-control" name="software" type="text">
            </div>
            <button type="submit" class="btn btn-lg btn-primary-outline">Submit</button>
        </form>
    </div>
</section>
@endsection
