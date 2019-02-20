@extends('layouts.template')
@section('content')
<script>
    var data = @json($data);
    var chartdata = [];
    var chartlabels = [];
    for (var i in data) {
        chartdata[i] = data[i].category_count;
        chartlabels[i] = data[i].category;
    }

    var data2 = @json($data2);
    var chartdata2 = [];
    var chartlabels2 = ['Solved', 'Un-Solved'];
    for (var j in data2) {
        chartdata2[j] = data2[j].solved_count;
    }

</script>
<section>
    <div class="welcome">
        <div class="container d-flex align-items-center col-12">
            <div class="h-100 col-8 py-5 text-center">
                <h2 class="h-100 align-middle text-light display-3">Hello {{Auth::user()->username}}!</h2>

            </div>
            <div class="col-4 my-3 text-left">
                <div class="d-inline-flex rounded-circle bg-light shadow p-3 my-3 rounded">
                    <i class="fas fa-6x fa-wrench logo-color m-3 align-middle"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row my-3 d-flex">
            <div class="col-lg-7 shadow">
                <div class="card border-0">
                    <div class="card-header border-0">Specific Problem Type
                    </div>
                    <p class="mx-3">A pie chart visualising the percentage of problems that belong to a specific
                        problem type.</p>
                    <div class="card-body">
                        <canvas id="chart1" height="150"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="text-center">
                    <h4 class="display-5 my-3">Most Recent Cases</h4>
                </div>
                <table id="resultsTable" class="table table-hover dataresults">
                    <thead>
                        <tr>
                            <th scope="col">Case ID</th>
                            <th scope="col">Category</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Solved</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($latestcases as $row)
                        <?php
                        $currentpriority = $row->priority;
                        if ($currentpriority == 1) {
                            $currentpriority = "Low";
                        } elseif ($currentpriority == 2) {
                            $currentpriority = "Medium";
                        } elseif ($currentpriority == 3) {
                            $currentpriority = "Urgent";
                        }
                        ?>
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->category}}</td>
                            <td>{{$currentpriority}}</td>
                            <td>{!! $row['solved'] ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>'!!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href={{route('cases.index')}}>
                    <button type="button" class="btn btn-primary-outline w-100 my-2">View all Cases</button>
                </a>
            </div>
        </div>
        <div class="row my-3 d-flex">
            <div class="col-lg-7 shadow">
                <div class="card border-0">
                    <div class="card-header border-0">Cases solved vs. Cases not Solved.
                    </div>
                    <p class="mx-3">A bar chart visualising the number of total cases solved versus the number of
                        unsolved cases.</p>
                    <div class="card-body">
                        <canvas id="chart2" height="150"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var chart1 = new Chart(document.getElementById("chart1"), {
        type: 'doughnut',
        data: {
            labels: chartlabels,
            datasets: [{
                data: chartdata,
                backgroundColor: ["#03a9f4", "#00bcd4", "#ffc107", "#e91e63", "#4caf50"],
                borderWidth: 1
            }]
        },
    });
    var chart2 = new Chart(document.getElementById("chart2"), {
        type: 'bar',
        data: {
            labels: chartlabels2,
            datasets: [{
                label: '# of Cases',
                data: chartdata2,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

</script>
@endsection
