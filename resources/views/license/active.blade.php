@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center align-items-center" style="height: 80vh">


    <div class="card border-primary mb-3" style="width: 28rem;">
        <div class="card-header"><strong>Active License</strong></div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <small><strong>Congratulations!</strong> {{ session('success') }}</small>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(session('failure'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <small><strong>Failed!</strong> {{ session('failure') }}</small>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form method="post" action="{{ route('active_license') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="license_key" class="col-form-label">License Key</label>
                        <div class="col">
                            <input type="text" class="form-control" id="license_key" name="license_key">
                            @error('license_key')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Activate</button>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="text-center">
                                <a href="{{ route('login') }}">Return to login page</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

@endsection