

@extends('layouts.template')

@section('content')

<script>
    var test = <?php echo $employees ?>;
    console.log(test);
</script>
<section>
    <div class="container-fluid my-5">
        <div class="row no-gutters align-items-center my-5">
            <div class="col-md-5">
                <input class="form-control form-control-lg shadow p-3 rounded table-search" type="search" placeholder="Search Existing employees...">
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
            </table>
        </div>
        <a class="row align-items-right p-3" href={{route('employees.create')}}>
            <button class="btn btn-lg btn-primary-outline" type="button">{{__('New employee')}}</button>
        </a>
    </div>
</section>
@endsection
