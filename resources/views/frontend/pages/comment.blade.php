<ul>
    @foreach($comments as $comment)
    @php $dep = $depth-1; @endphp
    <li>
        @if($comment->user_info['photo'])
        <div class="author-avatar pt-15">
            <img src="images/product-details/user.png" alt="User">
        </div>
        @else
        @endif
        <div class="comment-body pl-15">
                <span class="reply-btn pt-15 pt-xs-5"><a href="#">reply</a></span>
            <h5 class="comment-author pt-15">{{$comment->user_info['name']}}</h5>
            <div class="comment-post-date">
                {{$comment->created_at->format('g: i a')}} On {{$comment->created_at->format('M d Y')}}
            </div>
            <p>{{$comment->comment}}</p>
        </div>
        @include('frontend.pages.comment', ['comments' => $comment->replies, 'depth' => $dep])
    </li>
    @endforeach
</ul>