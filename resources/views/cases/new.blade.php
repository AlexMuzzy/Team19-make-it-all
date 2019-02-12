@yield('template')
@section('content')
<section>
    <div class="container my-5">
        <form>
            <div class="col-md-6 float-md-left">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputName">Full Name</label>
                        <input type="text" class="form-control" id="inputName">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPersonnelId">Personnel ID</label>
                        <input type="text" class="form-control" id="inputPersonnelId">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCatagory">Catagory</label>
                        <select id="inputCatagory" class="form-control">
                            <option selected>Choose...</option>
                            <option>Software</option>
                            <option>Hardware</option>
                            <option>Networking</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputIssue">Issue</label>
                        <select id="inputIssue" class="form-control">
                            <option selected>Choose...</option>
                            <option>Computer</option>
                            <option>Screen</option>
                            <option>Peripherals</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Case ID</label>
                        <input type="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPriority">Priority</label>
                        <select id="inputPriority" class="form-control">
                            <option selected>Choose...</option>
                            <option>Low</option>
                            <option>Medium</option>
                            <option>Urgent</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSummary">Summary</label>
                    <input type="text" class="form-control" id="inputSummary">
                </div>
                <a href="dashboard.html" class="btn btn-lg btn-primary-outline" role="submit">Submit</a>
            </div>
            <div class="col-md-6 float-md-left">
                <div class="form-group">
                    <label for="InputDescription">Description</label>
                    <textarea class="form-control" id="InputDescription" rows="12"></textarea>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection