@extends('layout') 


@section('content')
<!-- will be plopped into the 'yield' area of layout.blade -->
<div class="col-sm-8 blog-main">
  <h2>Create</h2>
  <form method="POST" action="/posts">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
      <label for="body">Body</label>
      <textarea class="form-control" id="body" name="body"></textarea>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  @include('partials.errors')
</div><!-- /.blog-main -->
@endsection
