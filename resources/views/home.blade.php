<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href={{asset('css/dashboard.css')}}>
    <script>
        (document).ready(function () {
            $enable - shadows;
        });
    </script>
    <title>Make-it-all Helpdesk Dashboard</title>
</head>

<body>

    <header class="container-fluid dashboard-body">
        <div class="row linear-back shadow p-3 mb-5 bg-white rounded">
            <div class="container d-flex align-items-center">
                <div class="col-md-7 text-light my-5 text-center text-md-left">
                    <h1 class="display-2 font-weight-bold respons-display">Hello {{Auth::user()->name}}</h1>
                    <h4>Please Select Past or Existing Cases</h4>
                </div>
                <div class="col-md-5 d-none d-md-block my-5 text-right">
                    <div class="d-inline-flex rounded-circle bg-light shadow p-3 mb-5 rounded">
                        <i class="fas fa-9x fa-wrench logo-color m-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section>

        <div class="container-fluid">

            <div class="row d-flex justify-content-center">
                <div class="col-lg-10">
                    <form class="card card-sm search-card">
                        <div class="row no-gutters align-items-center my-5">
                            <div class="col">
                                <input class="form-control form-control-lg shadow p-3 rounded" type="search"
                                    placeholder="Search by Case Name, ID or Case Type...">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-lg btn-primary-outline" type="submit">
                                    <i class="fas fa-search logo-color"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-block text-center my-4 shadow p-3 rounded font-weight-bold">
                            <p class="card-text">
                                <i class="fas fa-users fa-6x logo-color"></i>
                            </p>
                            <p class="card-title card-footer dashboard-text mb-5">Specialist Profiles</p>
                            <a href="specialists.html" class="card-link dashboard-link mb-5">Browse Specialists</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-block text-center my-4 shadow p-3 mb-5 rounded font-weight-bold">
                            <p class="card-text">
                                <i class="fas fa-plus-circle fa-6x logo-color"></i>
                            </p>
                            <p class="card-title card-footer dashboard-text mb-5">Add New Case</p>
                            <a href="addcase.html" class="card-link dashboard-link mb-5">Add a New Query</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-block text-center my-4 shadow p-3 mb-5 rounded font-weight-bold">
                            <p class="card-text">
                                <i class="fas fa-search fa-6x logo-color"></i>
                            </p>
                            <p class="card-title card-footer dashboard-text mb-5">View Cases</p>
                            <a href={{route('cases')}} class="card-link dashboard-link mb-5">Browse Existing Cases</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-block text-center my-4 shadow p-3 mb-5 rounded font-weight-bold">
                            <p class="card-text">
                                <i class="fas fa-keyboard fa-6x logo-color"></i>
                            </p>
                            <p class="card-title card-footer dashboard-text mb-5">Hardware Register</p>
                            <a href="hardware.html" class="card-link dashboard-link mb-5">View Hardware</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-block text-center my-4 shadow p-3 mb-5 rounded font-weight-bold">
                            <p class="card-text">
                                <i class="fas fa-phone fa-6x logo-color"></i>
                            </p>
                            <p class="card-title card-footer dashboard-text mb-5">Call Log</p>
                            <a href="logs.html" class="card-link dashboard-link mb-5">View or edit call log</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-block text-center my-4 shadow p-3 mb-5 rounded font-weight-bold">
                            <p class="card-text">
                                <i class="fas fa-user-circle fa-6x logo-color"></i>
                            </p>
                            <p class="card-title card-footer dashboard-text mb-5">Personnel Database</p>
                            <a href="profiles.html" class="card-link dashboard-link mb-5">Browse Personnel</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</body>

</html>