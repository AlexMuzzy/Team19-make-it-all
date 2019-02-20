@extends('layouts.template')

@section('content')
<section>
    <div class="table-responsive shadow p-3 rounded">
        <table id="resultsTable" class="table table-hover dataresults">
            <thead>
                <tr>
                    <th scope="col">Case ID</th>
                    <th scope="col">Employee ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Issue</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Solved</th>
                    <th scope="col">View & Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cases as $case)
                <?php
                    $currentpriority = $case->priority;
                    if ($currentpriority == 1) {
                        $currentpriority = "Low";
                    } elseif ($currentpriority == 2) {
                        $currentpriority = "Medium";
                    } elseif ($currentpriority == 3) {
                        $currentpriority = "Urgent";
                    }
                ?>
                <tr>
                    <td>{{$case->id}}</td>
                    <td>{{$case->employeeID}}</td>
                    <td>{{$case->fname}}</td>
                    <td>{{$case->sname}}</td>
                    <td>{{$case->category}}</td>
                    <td>{{$case->issue}}</td>
                    <td>{{$currentpriority}}</td>
                    <td>{!! $case['solved'] ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>' !!}
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary-outline" data-toggle="modal" data-target="#formModal{{ $case->id }}"
                            data-value="{{$case->id}}">View</button>
                    </td>
                </tr>
                <div class="modal fade" tabindex="-1" role="dialog" id="formModal{{ $case->id }}">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Case ID: {{ $case->id }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action={{route('cases.update', $case->id)}}>
                                @csrf
                                @method('PATCH')
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
                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputForename">Employee ID</label>
                                            <input type="text" class="form-control" id="inputForename" name="employeeID"
                                                value="{{ $case->employeeID }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputForename">First Name</label>
                                            <input type="text" class="form-control" id="inputForename" name="fname"
                                                value="{{ $case->fname }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputSurname">Surname</label>
                                            <input type="text" class="form-control" id="inputSurname" name="sname"
                                                value="{{ $case->sname }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCategory">Category</label>
                                            <select id="inputCategory" class="form-control" name="category">
                                                <option value="Software" @if(($case->category) == 'Software') selected
                                                    @endif
                                                    >Software</option>
                                                <option value="Hardware" @if(($case->category) == 'Hardware') selected
                                                    @endif
                                                    >Hardware</option>
                                                <option value="Networking" @if(($case->category) == 'Networking')
                                                    selected
                                                    @endif
                                                    >Networking</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputIssue">Issue</label>
                                            <input id="inputIssue" class="form-control" name="issue" value="{{ $case->issue }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputPriority">Priority</label>
                                            <select id="inputPriority" class="form-control" name="priority">
                                                <option value="1" @if(($case->priority) == '1') selected @endif
                                                    >Low</option>
                                                <option value="2" @if(($case->priority) == '2') selected @endif
                                                    >Medium</option>
                                                <option value="3" @if(($case->priority) == '3') selected @endif
                                                    >Urgent</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputSolved">Solved</label>
                                            <select id="inputSolved" class="form-control" name="solved" value="{{ $case->solved }}">
                                                <option value="Yes" @if(($case->solved) == '1') selected @endif
                                                    >Yes</option>
                                                <option value="No" @if(($case->solved) == '0') selected @endif
                                                    >No</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAssigned">Assigned To</label>
                                            <input id="inputAssigned" text="text" class="form-control" name="assignedTo"
                                                value="{{ $case->assignedTo }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSummary">Summary</label>
                                        <input type="text" class="form-control" id="inputSummary" name="summary" value="{{ $case->summary }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputnotes">Solved Explanation</label>
                                        <textarea type="text" class="form-control" id="inputnotes" name="notes"
                                            value="{{ $case->notes }}"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary-outline">Save changes</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
        <a class="row align-items-right p-3" href={{route('cases.create')}}>
            <button class="btn btn-lg btn-primary-outline" type="button">{{__('New Case')}}</button>
        </a>
    </div>
</section>
@endsection
