@extends('layouts.template')

@section('content')

<div class="container">
    @foreach ($userdetails as $user)
    <div class="shadow p-3 rounded font-weight-bold m-4">
        <h5>ID: {{ $user->id }} {{ $user->fname }} {{ $user->sname }}</h5>
        <div class="row">
            <div class="col-3">
                @if ($user->hardwareExpert == 1)
                <i class="fas fa-dot-circle"></i> Hardware Expert @endif
            </div>
            <div class="col-3">
                @if ($user->softwareExpert == 1)
                <i class="fas fa-dot-circle"></i> Software Expert @endif
            </div>
            <div class="col-3">
                @if ($user->networkExpert == 1)
                <i class="fas fa-dot-circle"></i> Network Expert @endif
            </div>
            <div class="modal fade shadow rounded" tabindex="-1" role="dialog" id="formModal{{ $user->id }}">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $user->fname.' '.$user->sname }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action={{route('specialists.update', $user->id)}}>
                            @csrf
                            @method('PATCH')
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="inputHardware">Hardware</label>
                                        <select id="inputHardware" class="form-control" name="hardwareExpert" value="{{ $user->hardwareExpert }}">
                                            <option value="Yes" @if(($user->hardwareExpert) == '1') selected @endif
                                                >Yes</option>
                                            <option value="No" @if(($user->hardwareExpert) == '0') selected @endif
                                                >No</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputSoftware">Software</label>
                                        <select id="inputSoftware" class="form-control" name="softwareExpert" value="{{ $user->softwareExpert }}">
                                            <option value="Yes" @if(($user->softwareExpert) == '1') selected @endif
                                                >Yes</option>
                                            <option value="No" @if(($user->softwareExpert) == '0') selected @endif
                                                >No</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputNetwork">Network</label>
                                        <select id="inputNetwork" class="form-control" name="networkExpert" value="{{ $user->networkExpert }}">
                                            <option value="Yes" @if(($user->networkExpert) == '1') selected @endif
                                                >Yes</option>
                                            <option value="No" @if(($user->networkExpert) == '0') selected @endif
                                                >No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <i class="fas fa-dot-circle"></i>
                                        Currently Assigned Cases: {{ $user->assignedCases }}
                                    </div>
                                    <div class="col-md-6">
                                        <i class="fas fa-dot-circle"></i>
                                        Total Solved Cases: {{ $user->solvedCases }}
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer border-0">
                                <button type="submit" class="btn btn-primary-outline">Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <button type="button" class=" float-right btn btn-primary-outline" data-toggle="modal" data-target="#formModal{{ $user->id }}"
                    data-value="{{$user->id}}">View</button>
            </div>
        </div>
    </div>
    @endforeach
    <a class="d-flex justify-content-right" href={{route('specialists.create')}}>
        <button class="btn btn-lg btn-primary-outline" type="button">{{__('New Specialist')}}</button>
    </a>
</div>
</div>
@endsection
