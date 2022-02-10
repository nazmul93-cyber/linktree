@extends('layouts.app')
@section('header')
    <h1>Dashboard Index</h1>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 card">
                <table class="table table-srtiped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Url</th>
                            <th>Visits</th>
                            <th>Last Visit</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($links as $link)
                            <tr>
                                <td>{{ $link->name }}</td>
                                <td><a href="{{ $link->link }}">{{ $link->link }}</a></td>
                                <td>{{ $link->visits_count }}</td>
                                <td>{{ $link->latest_visit ? $link->latest_visit->created_at->format('M d Y - H:ia') : 'N/A'}}</td>
                                <td><a href="/dashboard/links/{{ $link->id }}">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="/dashboard/links/new" class="btn btn-primary">Add link</a>
        </div>
    </div>
@endsection