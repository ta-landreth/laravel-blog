@extends('layout')

<!-- with blade/PHP, works from the bottom up -->


@section('content')
<!-- will be plopped into the 'yield' area of layout.blade -->
<div class="col-sm-8 blog-main">
@include('posts.post')

    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>
</div>
<!-- /.blog-main -->
@endsection


<!-- section is unique to the blade file; not ported to other blades -->