@extends('layouts.template')

@section('content')

<section>
    <thead>
        <tr>
            <th scope="col">Employee ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Job Title</th>
            <th scope="col">Department</th>
            <th scope="col">Telephone</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
        <tr>
            <td>{{$employee->id}}</td>
            <td>{{$employee->fname}}</td>
            <td>{{$employee->sname}}</td>
            <td>{{$employee->jobTitle}}</td>
            <td>{{$employee->department}}</td>
            <td>{{$employee->telephone}}</td>
            <td>
                <a href={{route('employees.edit', $employee->id)}} class="btn btn-primary-outline">Edit</a>
            </td>
            <td>
                <form action={{ route('employees.destroy', $employee->id) }} method="POST">
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
