@extends('layouts.template')

@section('content')
<section>
    <thead>
        <tr>
            <th scope="col">Software ID</th>
            <th scope="col">Vendor</th>
            <th scope="col">Software</th>
            <th scope="col">Supported?</th>
            <th scope="col">Licensed?</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($software as $row)
        <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->vendor}}</td>
            <td>{{$row->software}}</td>
            <td>{{$row['supported'] ? 'Yes' : 'No'}}</td>
            <td>{{$row['licensed'] ? 'Yes' : 'No'}}</td>
            <td>
                <a href={{route('software.edit', $row->id)}} class="btn btn-primary-outline">Edit</a>
            </td>
            <td>
                <form action={{ route('software.destroy', $row->id) }} method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">{{__('Delete')}}</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</section>
@endsection
