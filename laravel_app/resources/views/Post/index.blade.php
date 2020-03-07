@extends('layouts.app')
@include('navbar')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-header" style="font-size: 20px;">
                    <a style="text-decoration: none; color: black;" href="/user/{{ $post->user->id }}">
                        {{ $post->user->name }}
                    </a>
                        <span class="ml-30">
                        <a class="text-decoration-none" style="font-size: 20px; color: gray; float: right;" href="/destroy/{{ $post->id }}"><i class="fas fa-trash-alt"></i></a>
                        </span>
                </div>
                <div class="card-body p-0">
                    <img class="round-img w-100" src="/storage/post_images/{{ $post->id }}.jpg" alt="投稿画像">
                    <hr class="m-0">
                    <div class="card-body">
                        <div class="row parts">
                            <div id="like-icon-post-{{ $post->id }}">
                            @if ($post->likedBy(Auth::user())->count() > 0)
                                <a class="loved hide-text" data-remote="true" rel="nofollow" data-method="DELETE" href="/likes/{{ $post->likedBy(Auth::user())->firstOrFail()->id }}"><i class="fas fa-heart ml-3" style="font-size: 24px; color: red;"></i></a>
                            @else
                                <a class="love hide-text" data-remote="true" rel="nofollow" data-method="POST" href="/posts/{{ $post->id }}/likes"><i class="far fa-heart ml-3" style="font-size: 24px; color: red;"></i></a>
                            @endif
                            </div>
                        </div>
                        <div id="like-text-post-{{ $post->id }}">
                            @include('post.like_text')
                        </div>
                        <div>
                            <span><strong>{{ $post->user->name }}</strong></span>
                            <span>{{ $post->caption }}</span>
                            <br>
                            <div id="comment-post-{{ $post->id }}">
                                @include('post.comment_list')
                            </div>
                            <p>{{ $post->created_at }}</p>
                            <hr>
                            <div class="row actions" id="comment-form-post-{{ $post->id }}">
                                <form class="w-100" id="new_comment" action="/posts/{{ $post->id }}/comments" accept-charset="UTF-8" data-remote="true" method="POST">
                                    <input name="utf8"  type="hidden">
                                    {{ csrf_field() }}
                                    <input value="{{ Auth::user()->id }}" type="hidden" name="user_id">
                                    <input value="{{ $post->id }}" type="hidden" name="post_id">
                                    <input class="form-control comment-ipnut border-0" placeholder="コメント..." autocomplete="off" type="text" name="comment">
                                </form>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection