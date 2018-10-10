    @foreach($posts as $post)
    <div class="blog-post">
    <h2 class="blog-post-title"><a href="/posts/{{ $post->id }}">{{$post->title}}</a></h2>
        <p>Written by {{ $post->user->name }} on <span class="blog-post-meta">{{$post->created_at->toFormattedDateString()}}</span></p>
        <p>{{ $post->body }}</p>
    </div>
    {{ count($post->comments) }} comments
    <hr>
    <!-- /.blog-post -->
    @endforeach