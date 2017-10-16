@extends('layouts.main')

@section('title', 'Klant ' . $klant->naam . ' ' . $klant->voornaam . ' aanpassen')

@section('content')
    <div class="page-header">
        <h1>Klant aanpassen</h1>
    </div>

    {!! Form::model($klant, ['route'=>['klanten.update', $klant->id], 'method'=>'post', 'class'=>'form-horizontal']) !!}
    @include('klanten.form', ['btnText'=>'Bewaren'])
    {!! Form::close() !!}
@endsection