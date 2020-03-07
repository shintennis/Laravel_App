@extends('layouts.app')
@include('navbar')
@section('content')
<div class="profile-wrap">
    <div class="profile row">
        <div class="user-headre col-md-4 text-center">
            <h2>IMAGE</h2>
        </div>
        <div class=" col-md-8">
            <div class="row">
                <h1>{{ $user->name }}</h1>
                @if(Auth::user()->id == $user->id)
                <div class="col-md-12 p-0">
                    <a class="btn btn-outline-dark" href="/user/edit">プロフィール編集</a>
                    <a class="btn btn-outline-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">ログアウト</a>
                    <form action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection