@extends('layouts.app')
@section('header')
    <h1>Form - Edit Link</h1>
@endsection
@section('content')
<div class="container mt-6 card">
    <form action="/dashboard/links/{{ $link->id }}" method='POST' class="mt-6 mb-6">
        @csrf
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="name">Link Name</label>
                    <input type="text" name="name" id="name" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}" placeholder="My Youtube Channel" value="{{ $link->name }}">
                    @if ($errors->first('name'))
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="link">Link Url</label>
                    <input type="text" name="link" id="link" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}" placeholder="https://youtube.com/user/my-channel" value="{{ $link->link }}"
                    @if ($errors->first('link'))
                        <div class="invalid-feedback">{{ $errors->first('link') }}</div>
                    @endif
                </div>
            </div>
       </div>
       <div class="row">
            <div class="col-12">
                <button type="submit" class='btn btn-primary'>Update Link</button>
                <button type="button" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Delete Link</button>
            </div>
        </div>
    </form>
    <form id="delete-form" action="/dashboard/links/{{ $link->id }}" method="POST">
        @csrf
        @method('DELETE')
    </form>
</div>
@endsection