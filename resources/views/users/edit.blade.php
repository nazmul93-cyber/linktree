@extends('layouts.app')
@section('header')
    <h1>Edit User</h1>
@endsection
@section('content')
    <div style="background: {{ $user->background_color }};">
        <div class="container">
            <div class="row">
                <div class="col-12 card">
                    <form action="/dashboard/settings" method='POST' class="mt-6 mb-6">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="background_color">Background Color</label>
                                    <input type="text" name="background_color" id="background_color" class="form-control {{ $errors->first('background_color') ? 'is-invalid' : '' }}" placeholder="#ffffff" value="{{ $user->background_color }}">
                                    @if ($errors->first('background_color'))
                                        <div class="invalid-feedback">{{ $errors->first('background_color') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="text_color">Text Color</label>
                                    <input type="text" name="text_color" id="text_color" class="form-control {{ $errors->first('text_color') ? 'is-invalid' : '' }}" placeholder="#000000" value="{{ $user->text_color }}"
                                    @if ($errors->first('text_color'))
                                        <div class="invalid-feedback">{{ $errors->first('text_color') }}</div>
                                    @endif
                                </div>
                            </div>
                       </div>
                       <div class="row">
                            <div class="col-12">
                                <button type="submit" 
                                class="btn btn-primary {{ session('success') ? 'is-valid' : '' }}">
                                    {{ __('Save Settings') }}
                                </button>
                                @if(session('success'))
                                    <div class="valid-feedback">{{ session('success') }}</div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection