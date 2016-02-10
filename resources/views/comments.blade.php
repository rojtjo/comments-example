<ul>
    @foreach($comments as $comment)
        @if($parent === (int) $comment->parent_id)
            <li>
                <h2>{{ $comment->user->name }}</h2>
                <p>{{ $comment->message }}</p>
                @include('comments', ['comments' => $comments, 'parent' => (int) $comment->id])
            </li>
        @endif
    @endforeach
</ul>
