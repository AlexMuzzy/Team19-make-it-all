@extends('layouts.template')
@section('content')
<script>
    var data = @json($data);
    var counter = [];
    var labelles = [];
    for (i in data){
        counter[i] = data[i].category_count;
        labelles[i] = data[i].category;
    }
    console.log(data);
</script>
<section>
    <div class="welcome">
        <div class="container d-flex align-items-center col-12 mx-5">
            <div class="h-100 col-7 py-5  text-center">
                <h2 class="h-100 align-middle text-light display-4">Hello {{Auth::user()->username}}!</h2>
            </div>
            <div class="col-5 my-3 d-none d-md-block text-center">
                <div class="d-inline-flex rounded-circle bg-light shadow p-3 mb-5 rounded">
                    <i class="fas fa-6x fa-wrench logo-color m-3 align-middle"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0">Specific Problem Type
                    </div>
                    <p class="mx-3">A pie chart visualising the percentage of problems that belong to a specific problem type</p>
                    <div class="card-body">
                        <canvas id="s-p-t" height="150"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">Specific Problem Type
                        </div>
                        <p class="mx-3">A pie chart visualising the percentage of problems that belong to a specific problem type</p>
                        <div class="card-body">
                            <canvas id="s-p-p" height="150"></canvas>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>
<script>
    var ctx = document.getElementById("s-p-t")
    var sptChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labelles,
            datasets: [{
                data: counter,
                backgroundColor: ["#03a9f4", "#00bcd4", "#ffc107", "#e91e63", "#4caf50"],
                borderWidth: 1
            }]
        },
    });
    var ctx = document.getElementById("s-p-p")
    var sppChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labelles,
            datasets: [{
                data: counter,
                backgroundColor: ["#03a9f4", "#00bcd4", "#ffc107", "#e91e63", "#4caf50"],
                borderWidth: 1
            }]
        },
    });

</script>
@endsection
