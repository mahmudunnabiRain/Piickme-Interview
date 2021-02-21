@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
    <div class="card border-primary mb-3" style="width: 28rem;">
        <div class="card-header"><strong>Login</strong></div>
            <div class="card-body">
                @if(session('failure'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <small><strong>Failed!</strong> {{ session('failure') }}</small>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="phone_number" class="col-form-label">Phone</label>
                        <div class="col">
                            <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="+12025550134" value="{{ old('phone_number') }}">
                            @error('phone_number')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-form-label">Password</label>
                        <div class="col">
                            <input type="password" class="form-control" id="password" name="password">
                            @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
    </div>
</div>



@endsection