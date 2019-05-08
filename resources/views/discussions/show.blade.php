@extends('layouts.app')

@section('content')

    <div class="card mb-2">
        @include('partials.discussion-header')
        <div class="card-body">
            <div class="text-center">
                <strong>
                    {{ $discussion->title }}
                </strong>
            </div>
            <hr>
            {!! $discussion->content !!}
        </div>
    </div>

    <div class="card my-5">
        <div class="card-header">Add a reply</div>
        <div class="card-body">
                @auth
                    <form action="{{ route('replies.store',$discussion->slug) }}" method="post">
                        @csrf

                        <input type="hidden" name="reply" id="reply">
                        <trix-editor input="reply"></trix-editor>

                        <button type="submit" class="btn btn-sm btn-success my-2">Add Reply</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-info">Sign in to add a reply</a>
                @endauth
            </div>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js"></script>
@endsection
