@extends('layout') 
@section('content')
<div class="col-sm-8">
    <h1>Register</h1>
    <div class="text-muted">
        Register here!
    </div>
    <div class="offset-sm-1">
        <p>
            <form method="POST" action="/register">
                {{ csrf_field() }}

                <div class="form-group">
                    <div class="form-group col-sm-8">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" placeholder="Your Name" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group col-sm-8">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Your Email" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group col-sm-8">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" placeholder="Password" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group col-sm-8">
                        <label for="password_confirmation">Confirm:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group col-sm-8">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
                    @include('partials.errors')
            </form>
        </p>
    </div>
</div>
@endsection