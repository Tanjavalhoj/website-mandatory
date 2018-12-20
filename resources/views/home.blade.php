@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                </div>
                <div class="card-body">


                    <h4>Youtube user bruger data for den user med id = 1</h4>
                    @foreach($posts as $post)
                        {{$post->Username}} <br>
                        {{$post->Password}} <br>
                        {{$post->Firstname}} <br>
                        {{$post->Lastname}} <br>
                        {{$post->Birthday}} <br>
                        {{$post->ChannelId}} <br>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
