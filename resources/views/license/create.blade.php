@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center align-items-center" style="height: 80vh">

    <table id="client_table" class="table table-bordered border-primary table-light me-3" style="width:28rem; display:none">
        <tbody>
            <tr>
                <th scope="row">First Name</th>
                <td id="client_first_name" class="text-break"></td>
            </tr>
            <tr>
                <th scope="row">Last Name</th>
                <td id="client_last_name" class="text-break"></td>
            </tr>
            <tr>
                <th scope="row">Name of organization</th>
                <td id="client_organization" class="text-break"></td>
            </tr>
            <tr>
                <th scope="row">Street</th>
                <td id="client_street" class="text-break"></td>
            </tr>
            <tr>
                <th scope="row">City</th>
                <td id="client_city" class="text-break"></td>
            </tr>
            <tr>
                <th scope="row">Upazilla</th>
                <td id="client_upazilla" class="text-break"></td>
            </tr>
            <tr>
                <th scope="row">District</th>
                <td id="client_district" class="text-break"></td>
            </tr>
            <tr>
                <th scope="row">State</th>
                <td id="client_state" class="text-break"></td>
            </tr>
            <tr>
                <th scope="row">Phone</th>
                <td id="client_phone_number" class="text-break"></td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td id="client_email" class="text-break"></td>
            </tr>
            <tr>
                <th scope="row">License Key</th>
                <td id="client_license_key" class="text-break"></td>
            </tr>
            <tr>
                <th scope="row">Expire Date</th>
                <td id="client_expire_date" class="text-break"></td>
            </tr>
        </tbody>
    </table>

    <div class="card border-primary mb-3" style="width: 28rem">
        <div class="card-header"><strong>Create License</strong></div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <small><strong>Success!</strong> {{ session('success') }}</small>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(session('failure'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <small><strong>Failed!</strong> {{ session('failure') }}</small>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form method="post" action="{{ route('create_license') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="client_id" class="col-form-label">Client ID</label>
                        <div class="col">
                            <input type="number" class="form-control" id="client_id" name="client_id" placeholder="" value="{{ old('client_id') }}">
                            @error('client_id')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="license_key" class="col-form-label">License Key</label>
                        <div class="col">
                            @if(session('license_key'))
                                <input type="text" class="form-control" id="license_key" name="license_key" value="{{ session('license_key') }}">
                            @else
                                <input type="text" class="form-control" id="license_key" name="license_key" disabled>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="license_for" class="form-label">License for</label>
                        <div class="col">
                            <select id="license_for" name='license_for' class="form-select">
                            <option selected value="">Select an option</option>
                            <option>3 Months</option>
                            <option>6 Months</option>
                            <option>12 Months</option>
                            </select>
                            @error('license_for')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="d-grid">
                                <button type="button"class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-grid">
                                <button type="submit"class="btn btn-primary">Create Key</button>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){

            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                    event.preventDefault();
                    var id = $('#client_id').val();
                    hideTable();
                    getMessage(id);
                    return false;
                }
            });

        });

        function showTable() {
            var x = document.getElementById("client_table");
            x.style.display = "table";
        } 

        function hideTable() {
            var x = document.getElementById("client_table");
            x.style.display = "none";
        }

        function getMessage(id) {
            $.ajax({
                type:'get',
                url: 'user/'+id,
                dataType: 'json',
                success:function(response) {
                    if(response['data'] !== null){
                        showTable();
                        $("#client_first_name").html(response['data'].first_name);
                        $("#client_last_name").html(response['data'].last_name);
                        $("#client_organization").html(response['data'].organization);
                        $("#client_street").html(response['data'].street);
                        $("#client_city").html(response['data'].city);
                        $("#client_phone_number").html(response['data'].phone_number);
                        $("#client_email").html(response['data'].email);
                        $("#client_license_key").html(response['data'].license_key);
                        $("#client_expire_date").html(response['data'].expire_date);
                    }
                }
            });
        }
    </script>



@endsection