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
        <form method="POST" action={{route('hardware.update', $hardware->id)}}>
            @csrf
            @method('PATCH')
            <div class="form-group col-md-12">
                <label for="inputHardware">Hardware Name</label>
                <input type="text" class="form-control" id="inputHardware" name="hardware" value={{ $hardware->hardware }}>
            </div>
            <div class="form-group col-md-12">
                    <label for="inputHardwareSN">Hardware Serial</label>
                    <input id="inputHardwareSN" class="form-control" name="hardwareSN" type="text" value={{ $hardware->hardwareSN }}>
                </div>
            <div class="form-group col-md-12">
                <label for="inputType">Type</label>
                <input type="text" class="form-control" id="inputType" name="type"  value={{ $hardware->type }}>
            </div>
            <div class="form-group col-md-12">
                <label for="inputVendor">Vendor</label>
                <input id="inputVendor" class="form-control" name="vendor" type="text"  value={{ $hardware->vendor }}>
            </div>
            
            <button type="submit" class="btn btn-lg btn-primary-outline">Submit</button>
        </form>
    </div>
</section>
@endsection
