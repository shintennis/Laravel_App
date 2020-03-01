@extends('layouts.app')
@include('navbar')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-header">
                    {{ Auth::user()->name }}
                    <a class="btn btn-outline-danger ml-7" href="/destroy/{{ $post->id }}">削除</a>
                </div>
                <div class="card-body p-0">
                    <img class="round-img w-100" src="/storage/post_images/{{ $post->id }}.jpg" alt="投稿画像">
                    <hr class="m-0">
                    <div class="liked"><i class="far fa-heart"></i></div>
                    <p>
                        {{ $post->comment }}
                        <br>
                        <span>{{ $post->created_at }}</span>
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection