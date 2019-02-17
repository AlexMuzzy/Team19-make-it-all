@extends('layouts.template')

@section('content')
<section>
    <thead>
        <tr>
            <th scope="col">Case ID</th>
            <th scope="col">Employee ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Category</th>
            <th scope="col">Issue</th>
            <th scope="col">Priority</th>
            <th scope="col">Summary</th>
            <th scope="col">Solved</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>

        </tr>
    </thead>
    <tbody>
        @foreach($cases as $case)
        <tr>
            <td>{{$case->id}}</td>
            <td>{{$case->employeeID}}</td>
            <td>{{$case->fname}}</td>
            <td>{{$case->sname}}</td>
            <td>{{$case->category}}</td>
            <td>{{$case->issue}}</td>
            <td>{{$case->priority}}</td>
            <td>{{$case->summary}}</td>
            <td>{{$case['solved'] ? 'Yes' : 'No'}}</td>
            <td>
                <a href={{route('cases.edit', $case->id)}} class="btn btn-primary-outline">Edit</a>
            </td>
            <td>
                <form action={{ route('cases.destroy', $case->id) }} method="POST">
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
