@extends('layouts.app')
@include('navbar')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>投稿</h2>
        </div>
        <div class="card-body">
            <form action="{{ url('store') }}" enctype="multipart/form-data" accept-charset="UTF-8" method="POST">
                {{ csrf_field() }}
                <div class="card-group">
                    
                    <div class="col-auto m-auto w-50">
                        <input class="form-control border-0" name="photo" type="file" accept="image/jpeg,image/gif,image/png" placeholder="画像を選択してください"/>
                        <br>
                        <input class="form-control border-1" name="comment" type="text" placeholder="コメントを書く"/>
                        <br>
                        <input class="form-submit btn btn-outline-dark" type="submit" value="投稿する"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection