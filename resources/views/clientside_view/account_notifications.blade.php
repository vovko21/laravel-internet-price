@extends('layouts.master')

@include('clientside_view.header')

@section('includes')
    <link href="/css/clientside/notification.css" rel="stylesheet"/>
@endsection

@section('content')
    @foreach($notifications as $notification)
        @if($notification['data']->status == 'info')
            <div class="container d-flex justify-content-center mb-3">
                <div class="card mt-5 p-3">
                    <div class="media">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <div class="media-body">
                        <h6 class="mt-2 mb-0">{{$notification['data']->message}}</h6> <small class="text">{{$notification['created_at']}}</small>
                    </div>
                </div>
            </div>
        @elseif($notification['data']->status == 'error')
            <div class="container d-flex justify-content-center mb-3">
                <div class="card mt-5 p-3">
                    <div class="media">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="media-body">
                        <h6 class="mt-2 mb-0">{{$notification['data']->message}}</h6> <small class="text">{{$notification['created_at']}}</small>
                    </div>
                </div>
            </div>
        @endif

    @endforeach
@endsection
