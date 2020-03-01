@extends('layouts.app')
@include('navbar')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-header" style="font-size: 20px;">
                    <a href="#">
                        {{ Auth::user()->name }}
                    </a>
                        <span class="ml-30">
                        <a class="text-decoration-none" style="font-size: 20px; color: gray; float: right;" href="/destroy/{{ $post->id }}"><i class="fas fa-trash-alt"></i></a>
                        </span>
                </div>
                <div class="card-body p-0">
                    <img class="round-img w-100" src="/storage/post_images/{{ $post->id }}.jpg" alt="投稿画像">
                    <hr class="m-0">
                        <div class="card-body liked">
                            <div class="row parts">
                                <div id="like-icon-post-{{ $post->id }}">
                                    @if(@post->likedBy(Auth::user())->count() > 0)
                                        <a class="loved hide-text" data-remote="true" rel="nofollow" data-method="DELETE" href="likes/{{ $post->likeBy(Auth::user())->firstOrFail()->id }}">いいねを取り消す</a>
                                    @else
                                        <a class="love hide-text" data-remote="true" rel="nofollow" data-method="POST" href="/{{ $post->id }}/likes">いいね</a>
                                    @endif
                                </div>
                                <a class="comment" href="#">コメント...</a>
                            </div>
                            <div id="like-text-post-{{ $post->id }}">
                                @include('post.like_text')
                            </div>
                            <div>
                                <span><strong>{{ $post->user->name }}</strong></span>
                                <span>{{ $post->comment }}</span>
                            </div>
                        </div>
                    <p>
                        <span>{{ Auth::user()->name }}</span>{{ $post->comment }}
                        <br>
                        <span>{{ $post->created_at }}</span>
                    </p>
                </div>
                <div class="comments">
                    <input class="border-0 w-100" type="text" placeholder="コメント...">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection