@include('shared.errors')

<div class="row">
    <div class="form-group">
        {!! Form::label('factuurnummer', 'Factuurnummer: ', ['class'=>'control-label col-lg-2']) !!}

        <div class="col-lg-2">
            @if (isset ($factuur))
                {!! Form::hidden('factuurnummer') !!}
                {{ $factuur->factuurnummer }}
            @else
                {!! Form::hidden('factuurnummer', $fn) !!}
                {{ $fn }}
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
        {!! Form::label('datum', 'Factuur Datum: ', ['class'=>'control-label col-lg-2']) !!}

        <div class="col-lg-3">
            {!! Form::date('datum', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
        </div>

        {!! Form::label('vervaldagtype_id', 'Vervaldag termijn: ', ['class'=>'control-label col-lg-2']) !!}

        <div class="col-lg-3">
            {!! Form::select('vervaldagtype_id', $vervaldagtypes, null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
        {!! Form::label('bedrag', 'Factuur Bedrag: ', ['class'=>'control-label col-lg-2']) !!}
        <div class="col-lg-3">
            {!! Form::number('bedrag', null, ['class'=>'form-control'])!!}
        </div>

        {!! Form::label('betaald','Betaald: ', ['class'=>'control-label col-lg-2']) !!}
        <div class="col-lg-3">
            {!! Form::text('betaald', null, ['class'=>'form-control']) !!}
        </div>

        <div class="col-lg-2 checkbox">
            <label>
                {!! Form::checkbox('voldaan') !!} Voldaan ?
            </label>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
        {!! Form::label('betalingswijze', 'Betalingswijze: ', ['class'=>'control-label col-lg-2']) !!}
        <div class="col-lg-5">
            {{ Form::radio('betalingswijze', '1') }} Cash&nbsp;
            {{ Form::radio('betalingswijze', '2') }} Cheque&nbsp;
            {{ Form::radio('betalingswijze', '3') }} Bank&nbsp;
            {{ Form::radio('betalingswijze', '4') }} Electronisch&nbsp;
        </div>
    </div>
</div>

<hr>

<h5>Factuur details</h5>

<div class="row">
    <div class="form-group">
        {!! Form::label('Klant', 'Klant naam: ', ['class'=>'control-label col-lg-2']) !!}
        <div class="col-lg-3">
            {!! Form::select('klant_id', $klanten, null, ['id'=>'klant_id','class'=>'form-control']) !!}
        </div>
        <div class="col-lg-2">
            {{ Form::text('zoekklant', null, ['id'=>'zoekklant', 'class'=>'form-control', 'placeholder'=>'Zoek op naam']) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
        {!! Form::label('merk_id', 'Merk: ', ['class'=>'control-label col-lg-2']) !!}
        <div class="col-lg-3">
            {!! Form::select('merk_id', $merken, null, ['class'=>'form-control']) !!}
        </div>

        {!! Form::label('makelaar_id', 'Makelaar: ', ['class'=>'control-label col-lg-2']) !!}
        <div class="col-lg-2">
            {!! Form::select('makelaar_id', $makelaars, null, ['class'=>'form-control']) !!}
        </div>

    </div>
</div>

<div class="row">
    <div class="form-group">
        {!! Form::label('type', 'Type: ', ['class'=>'control-label col-lg-2']) !!}
        <div class="col-lg-3">
            {!! Form::text('type', null, ['class'=>'form-control']) !!}
        </div>

        {!! Form::label('maatschappij_id', 'Maatschappij: ', ['class'=>'control-label col-lg-2']) !!}
        <div class="col-lg-2">
            {!! Form::select('maatschappij_id', $maatschappijen,null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
        {!! Form::label('opmerkingen', 'Opmerkingen: ', ['class'=>'control-label col-lg-2']) !!}
        <div class="col-lg-5">
            {!! Form::textarea('opmerkingen', null, ['class'=>'form-control', 'size'=>'60x5']) !!}
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-lg-4 col-lg-offset-2">
{!! Form::submit($btnText, ['class'=>'btn btn-primary']) !!}
<a href="{{ route('facturen.home') }}" class="btn btn-link">Annuleren</a>
    </div>
</div>