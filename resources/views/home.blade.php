@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body p-0" id="app">
                   <chat-app :user="{{auth()->user()}}"></chat-app>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
