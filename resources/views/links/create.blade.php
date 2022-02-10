@extends('layouts.app')
@section('header')
    <h1>Form - Create New Link</h1>
@endsection
@section('content')
<div class="container mt-6 card">
    <form action="/dashboard/links/new" method='POST'>
        @csrf
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="name">Link Name</label>
                    <input type="text" name="name" id="name" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}" placeholder="My Youtube Channel" value="{{ old('name') }}">
                    @if ($errors->first('name'))
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="link">Link Url</label>
                    <input type="text" name="link" id="link" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}" placeholder="https://youtube.com/user/my-channel" value="{{ old('link') }}"
                    @if ($errors->first('link'))
                        <div class="invalid-feedback">{{ $errors->first('link') }}</div>
                    @endif
                </div>
            </div>
       </div>
       <div class="row">
            <div class="col-12">
                <button type="submit" class='btn btn-primary'>Store Link</button>
            </div>
        </div>
    </form>
</div>
@endsection