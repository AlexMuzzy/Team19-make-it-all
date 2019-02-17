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
        <form method="POST" action="{{route('hardware.store')}}">
            @csrf
            <div class="form-group col-md-12">
                <label for="inputHardware">Hardware Name</label>
                <input type="text" class="form-control" id="inputHardware" name="hardware">
            </div>
            <div class="form-group col-md-12">
                    <label for="inputHardwareSN">Hardware Serial</label>
                    <input id="inputHardwareSN" class="form-control" name="hardwareSN" type="text">
                </div>
            <div class="form-group col-md-12">
                <label for="inputType">Type</label>
                <input type="text" class="form-control" id="inputType" name="type">
            </div>
            <div class="form-group col-md-12">
                <label for="inputVendor">Vendor</label>
                <input id="inputVendor" class="form-control" name="vendor" type="text">
            </div>
            
            <button type="submit" class="btn btn-lg btn-primary-outline">Submit</button>
        </form>
    </div>
</section>
@endsection
