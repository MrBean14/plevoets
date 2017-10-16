<table class="table table-sm table-striped">
    <thead>
    <tr>
        <th>Nr</th>
        <th>Datum</th>
        <th>Klant</th>
        <th class="text-right">Bedrag</th>
        <th class="text-right">Betaald bedrag</th>
        <th class="text-right">Te betalen</th>
        <th>Vervaldag</th>
    </tr>
    </thead>
    <tbody>

    @foreach($facturen as $factuur)
        <tr>
            <td><a href="{{ route('facturen.edit', $factuur->id) }}">{{ $factuur->factuurnummer }}</a></td>
            <td>{{ \Carbon\Carbon::parse($factuur->datum)->format('d/m/Y') }}</td>
            <td>{{ $factuur->klant->naam }}</td>
            <td class="text-right">{{ $factuur->bedrag }} EUR</td>
            <td class="text-right">
                {{ $factuur->betaald == null ? '0 EUR' : $factuur->betaald.' EUR' }}
            </td>

            <td class="text-right">{{ $factuur->bedrag - $factuur->betaald }} EUR</td>

            @if ($factuur->voldaan == 1)
                <td>Voldaan</td>
            @else
                @if (\Carbon\Carbon::now()->gt(\Carbon\Carbon::parse($factuur->vervaldag)))
                    <td style="color:red">
                @else
                    <td>
                        @endif
                        {{ \Carbon\Carbon::parse($factuur->vervaldag)->format('d/m/Y') }}</td>
                @endif
        </tr>
    @endforeach
    </tbody>
</table>