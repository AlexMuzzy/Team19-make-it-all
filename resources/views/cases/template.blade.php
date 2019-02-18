<?
    $name = Route::currentRouteName();
    if (strpos($name, '.')){
        $name = substr($name, strpos($name, '.'), +1);
    }
    if($name == 'index'){
        $currentroute = $name.'.update';
    } else {
        $currentroute = $name.'.store';
    }
?>

<form method="POST" action={{route($currentroute, $case->id)}}>
    @csrf
    @if($name == 'index')
        @method('PATCH')
    @endif
    <div class="modal-body">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputForename">Employee ID</label>
                <input type="text" class="form-control" id="inputForename" name="employeeID" value="{{ $case->employeeID }}">
            </div>
            <div class="form-group col-md-4">
                <label for="inputForename">First Name</label>
                <input type="text" class="form-control" id="inputForename" name="fname" value="{{ $case->fname }}">
            </div>
            <div class="form-group col-md-4">
                <label for="inputSurname">Surname</label>
                <input type="text" class="form-control" id="inputSurname" name="sname" value="{{ $case->sname }}">
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
            <div class="form-group col-md-6">
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
            <div class="form-group col-md-6">
                <label for="inputSolved">Solved</label>
                <select id="inputSolved" class="form-control" name="solved" value="{{ $case->solved }}">
                    <option value="Yes" @if(($case->priority) == '1') selected @endif
                        >Yes</option>
                    <option value="No" @if(($case->priority) == '0') selected @endif
                        >No</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputSummary">Summary</label>
            <input type="text" class="form-control" id="inputSummary" name="summary" value="{{ $case->summary }}">
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</form>