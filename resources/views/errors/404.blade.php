@extends('layouts.main')

@section('title', 'Data niet gevonden')

@section('content')
    <div class="page-header">
        <h1>404 <small>Automerk niet gevonden</small></h1>
    </div>
    
    <p class="lead">
        Sorry...
    </p>

    <a href="{{ route('cars.home') }}" class="btn btn-primary">Toon de lijst met automerken</a>
@endsection