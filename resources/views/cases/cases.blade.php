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
                    <button class="btn btn-lg btn-primary-outline" type="submit">
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
                        </tr>
                    </thead>
                </table>
            </div>
            <a class="row align-items-right mt-5">
                <button class="btn btn-lg btn-primary-outline" type="button" href={{route('home')}}>{{__('New Case')}}</button>
            </a>
        </div>
    </section>
@endsection
