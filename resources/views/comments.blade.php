<ul>
    @foreach($comments as $comment)
        <li>
            <h2>{{ $comment->user->name }}</h2>
            <p>{{ $comment->message }}</p>
            @if(count($comment->children) > 0)
                @include('comments', ['comments' => $comment->children])
            @endif
        </li>
    @endforeach
</ul>
