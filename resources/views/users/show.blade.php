@extends('layouts.app')
@section('header')
    <h1>Users Page</h1>
@endsection
@section('content')
    <div style="background: {{ $user->background_color }};">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3">
                
                    @foreach ($user->links as $link)
                        <div class="link">
                            <a  href="{{ $link->link }}" 
                                class="user-link d-block p-4 mb-4 rounded h3 text-center"
                                target="_black"
                                rel="nofollow"
                                style="color:{{ $user->text_color }}; border:2px solid {{ $user->text_color }};">

                                {{ $link->name }}
                            </a>    
                        </div>         
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
@endsection