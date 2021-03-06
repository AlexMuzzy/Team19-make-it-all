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
        <form method="POST" action="{{route('software.store')}}">
            @csrf
            <div class="form-group col-md-12">
                <label for="inputVendor">Software Vendor</label>
                <input type="text" class="form-control" id="inputVendor" name="vendor">
            </div>
            <div class="form-group col-md-12">
                <label for="inputSoftware">Software Name</label>
                <input type="text" class="form-control" id="inputSoftware" name="software">
            </div>
            <div class="form-group col-md-12">
                <label for="inputSupported">Supported?</label>
                <select id="inputSupported" class="form-control" name="supported">
                    <option selected disabled>Choose...</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="form-group col-md-12">
                <label for="inputLicensed">Licensed?</label>
                <select id="inputLicensed" class="form-control" name="licensed">
                    <option selected disabled>Choose...</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-lg btn-primary-outline">Submit</button>
        </form>
    </div>
</section>
@endsection
