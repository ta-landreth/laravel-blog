@extends('layout') 
@section('content')
<div class="col-sm-8">
    <h1>Log in</h1>
    <div class="text-muted">
        Log in here!
    </div>
    <div class="offset-sm-1">
        <p>
            <form method="POST" action="/login">
                {{ csrf_field() }}

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
                        <button type="submit" class="btn btn-primary">Log in</button>
                    </div>
                </div>
                    @include('partials.errors')
            </form>
        </p>
    </div>
</div>
@endsection