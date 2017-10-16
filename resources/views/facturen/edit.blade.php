@extends('layouts.main')

@section('title', 'Factuur ' . $factuur->factuurnummer . ' aanpassen')

@section('scripts')
    <script src="{{ asset('js/jquery.js') }}"></script>
@endsection

@section('content')

    <script>
        $(function () {
            $('#klant_id').filterByText($('#zoekklant'));
        });
    </script>
    @include('search.searchKlantenFactuur')

    <div class="page-header">
        <h1>Factuur</h1>
    </div>

    {!! Form::model($factuur, ['route'=>['facturen.update', $factuur->id], 'method'=>'post', 'class'=>'form-horizontal']) !!}

    @include('facturen.form', ['btnText'=>'Bewaren'])

    {!! Form::close() !!}
@endsection