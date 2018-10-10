
@if(count($post->comments))
<hr>
<h5>Comments:</h5>
@foreach($post->comments as $comment)
<div class="card">
    <div class="card-header"><span class="blog-post-meta">[User]</span> wrote (<span class="blog-post-meta">{{$comment->created_at->diffForHumans()}}</span> ago):
    </div>
    <div class="card-body">
      <p class="card-text">{{ $comment->body }}</p>
    </div>
  </div>
<!-- /.blog-post -->
@endforeach
@endif