@extends('layouts.main')

@section('title', 'Export')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">
            <h1>Export</h1>
        </div>
    </div>

    <a href="{{ Route('export.export')}}" class="btn btn-primary">Export</a>

@endsection