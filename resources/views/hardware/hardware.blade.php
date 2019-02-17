@extends('layouts.template')

@section('content')
<section>
    <div class="table-responsive shadow p-3 rounded">
        <table id="resultsTable" class="table table-hover dataresults">
            <thead>
                <tr>
                    <th scope="col">Hardware ID</th>
                    <th scope="col">Hardware</th>
                    <th scope="col">Hardware Serial</th>
                    <th scope="col">Type</th>
                    <th scope="col">Vendor</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hardware as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->hardware}}</td>
                    <td>{{$row->hardwareSN}}</td>
                    <td>{{$row->type}}</td>
                    <td>{{$row->vendor}}</td>
                    <td>
                        <a href={{route('hardware.edit', $row->id)}} class="btn btn-primary-outline">Edit</a>
                    </td>
                    <td>
                        <form action={{ route('hardware.destroy', $row->id) }} method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">{{__('Delete')}}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a class="row align-items-right p-3" href={{route('hardware.create')}}>
            <button class="btn btn-lg btn-primary-outline" type="button">{{__('New Hardware')}}</button>
        </a>
</section>
@endsection
