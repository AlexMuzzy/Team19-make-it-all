@extends('layouts.template')

@section('content')
    <section>
        <div class="container">
            <div class="row no-gutters align-items-center my-5">
                <div class="col-md-5">
                    <input class="form-control form-control-lg shadow p-3 rounded table-search" type="search"
                        placeholder="Search Existing Cases...">
                </div>
                <div class="col-auto">
                    <button class="btn btn-lg btn-primary-outline d-none d-md-block" type="submit">
                        <i class="fas fa-search logo-color"></i>
                    </button>
                </div>
            </div>
            <div class="table-responsive shadow p-3 rounded">
                <table class="table table-hover dataresults">
                    <thead>
                        <tr>
                            <th scope="col">Case ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Issue</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Summary</th>
                            <th scope="col">Solved</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cases as $case)
                        <tr>
                            <td>{{$case->id}}</td>
                            <td>{{$case->fname}}</td>
                            <td>{{$case->sname}}</td>
                            <td>{{$case->category}}</td>
                            <td>{{$case->issue}}</td>
                            <td>{{$case->priority}}</td>
                            <td>{{$case->summary}}</td>
                            <td>{{$case->solved}}</td>
                            <td>
                                <a href={{route('cases.edit', $case->id)}} class="btn btn-primary-outline">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
            <a class="row align-items-right p-3" href={{route('cases.create')}}>
                <button class="btn btn-lg btn-primary-outline" type="button">{{__('New Case')}}</button>
            </a>
        </div>
    </section>
@endsection
