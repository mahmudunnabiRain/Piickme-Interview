@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center align-items-center" style="height: 80vh">
    <div class="card border-primary mb-3" style="width: 48rem;">
        <div class="card-header"><strong>Register</strong></div>
            <div class="card-body">
                <form class="row g-3" method="post" action="{{ route('register') }}">
                    @csrf
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Jesse" value="{{ old('first_name') }}">
                        @error('first_name')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="PinkMan" value="{{ old('last_name') }}">
                        @error('last_name')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="someone@example.com" value="{{ old('email') }}">
                        @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="phone_number" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="+12025550134" value="{{ old('phone_number') }}">
                        @error('phone_number')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-12">
                        <label for="street" class="form-label">Street</label>
                        <input type="text" class="form-control" id="street" name="street" placeholder="1234 Main St" value="{{ old('street') }}">
                        @error('street')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="New Mexico, US" value="{{ old('city') }}">
                        @error('city')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="organization" class="form-label">Organization</label>
                        <input type="text" class="form-control" id="organization" name="organization" placeholder="Piickme LTD." value="{{ old('organization') }}">
                        @error('organization')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        @error('password_confirmation')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-12 d-grid">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
    </div>
</div>


@endsection