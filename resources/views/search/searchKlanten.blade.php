<table class="table table-sm table-striped">
    <tr>
        <th>Naam</th>
        <th>Adres</th>
        <th>Telefoon</th>
        <th></th>
    </tr>

    @foreach($searchKlanten as $klant)
        <tr>
            <td>{{ $klant->naam }} {{ $klant->voornaam }}</td>
            <td>{{ $klant->straat }} {{ $klant->nr }} {{ $klant->postcode }} {{ $klant->gemeente }}</td>
            <td>{{ $klant->telefoon }}</td>
            <td><a href="{{ route('klanten.edit', $klant->id) }}">Aanpassen</a></td>
        </tr>
    @endforeach
</table>