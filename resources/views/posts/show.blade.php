@extends('layout') 
@section('content')

<div class="col-sm-8 blog-main">
  <section class="form-group align-items-start padded-post">
    <h1 class="display-4">{{$post->title}}</h1>
    <p>Written by {{$post->user->name }} on {{$post->created_at->toFormattedDateString()}}
    <p class="lead">{{$post->body}}</p>
  </section>
  <div class="col-sm-8">
  @include('comments.index')
  </div>
  <div class="col-sm-12">
      <hr>
    @include('comments.create')
    </div>
</div>
@endsection