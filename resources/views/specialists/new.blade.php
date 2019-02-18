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
        <form method="POST" action="{{route('specialists.store')}}">
            @csrf
            <div class="form-group col-md-12">
                <label for="inputEmployeeID">Employee ID</label>
                <input type="text" class="form-control" id="inputEmployeeID" name="employeeid">
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputHardware">Hardware Expert?</label>
                    <select id="inputHardware" class="form-control" name="hardwareExpert">
                        <option disabled selected>Choose...</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputSoftware">Software Expert?</label>
                    <select id="inputSoftware" class="form-control" name="softwareExpert">
                        <option disabled selected>Choose...</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputNetworks">Network Expert?</label>
                    <select id="inputNetworks" class="form-control" name="networkExpert">
                        <option disabled selected>Choose...</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-lg btn-primary-outline">Submit</button>
        </form>
    </div>
</section>
@endsection
