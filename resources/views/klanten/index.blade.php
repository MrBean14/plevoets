@extends('layouts.main')

@section('title', 'Klanten')

@section('scripts')
    <script src="{{ asset('js/search.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ route('klanten.create') }}" class="btn btn-primary">Maak nieuwe klant aan</a>
            <br>
            @include('search.search')
        </div>
    </div>


    @if ($klanten->IsEmpty())
        <p>Er zijn nog geen klanten aanwezig !</p>
    @else
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Naam</th>
                <th>Adres</th>
                <th>Telefoon</th>
                <th>Email</th>
                <th>BTW</th>
            </tr>
            </thead>
            <tbody>
            @foreach($klanten as $klant)
                <tr>
                    <td><a href="{{ route('klanten.edit', $klant->id) }}">{{ $klant->naam }} {{$klant->voornaam}}</a></td>
                    <td>{{ $klant->straat }}&nbsp;{{ $klant->nr }}, {{ $klant->postcode }} {{ $klant->gemeente }}</td>
                    <td>{{ $klant->telefoon }}</td>
                    <td>{{ $klant->email }}</td>
                    @if ($klant->btw = true)
                        <td>{{ $klant->btwnr }}</td>
                    @endif
                </tr>
            @endforeach

            {{ $klanten->links() }}
            </tbody>
        </table>

    @endif


@endsection