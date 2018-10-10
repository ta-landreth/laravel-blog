<!-- will be plopped into the 'yield' area of layout.blade -->
<div class="card">
    <form method="POST" action="/posts/{{$post->id}}/comments">
        {{ csrf_field() }}
        <div class="card-block">
            <h5>Leave a Comment:</h5>
            <div class="form-group">
                <textarea class="form-control" placeholder="Your comments here" id="body" name="body"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Comment</button>
            </div>
        </div>
    @include('partials.errors')

</div>
</form>
<!-- /.blog-main -->