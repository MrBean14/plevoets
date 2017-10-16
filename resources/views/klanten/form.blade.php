@include('shared.errors')

<div class="row">
    <div class="form-group">
        {!! Form::label('naam', 'Naam: ', ['class'=>'control-label col-lg-2']) !!}
        <div class="col-lg-5">
            {!! Form::text('naam', null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
        {!! Form::label('voornaam', 'Voornaam: ', ['class'=>'control-label col-lg-2']) !!}
        <div class="col-lg-5">
            {!! Form::text('voornaam', null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
        {!! Form::label('straat', 'Straat: ', ['class'=>'control-label col-lg-2']) !!}
        <div class="col-lg-5">
            {!! Form::text('straat', null, ['class'=>'form-control']) !!}
        </div>
        {!! Form::label('nr', 'Nr: ', ['class'=>'control-label col-lg-2']) !!}
        <div class="col-lg-1">
            {!! Form::text('nr', null, ['class'=>'form-control']) !!}
        </div>
    </div>

</div>

<div class="row">
    <div class="form-group">
        {!! Form::label('postcode', 'Postcode: ', ['class'=>'control-label col-lg-2']) !!}
        <div class="col-lg-1">
            {!! Form::text('postcode', null, ['class'=>'form-control']) !!}
        </div>
        {!! Form::label('gemeente', 'Gemeente: ', ['class'=>'control-label col-lg-2']) !!}
        <div class="col-lg-5">
            {!! Form::text('gemeente', null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
        {!! Form::label('telefoon', 'Telefoon: ', ['class'=>'control-label col-lg-2']) !!}
        <div class="col-lg-2">
            {!! Form::text('telefoon', null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
        {!! Form::label('email', 'Email adres: ', ['class'=>'control-label col-lg-2']) !!}
        <div class="col-lg-5">
            {!! Form::text('email', null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
        {!! Form::label('btw', 'BTW? ', ['class'=>'control-label col-lg-2']) !!}
        <div class="col-lg-1">
            {!! Form::checkbox('btw') !!}
        </div>

        {!! Form::label('btwnr', 'BTW nr: ', ['class'=>'control-label col-lg-2']) !!}
        <div class="col-lg-5">
            {!! Form::text('btwnr', null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
        {!! Form::label('opmerkingen', 'Opmerkingen: ', ['class'=>'control-label col-lg-2']) !!}
        <div class="col-lg-5">
            {!! Form::textarea('opmerking', null, ['class'=>'form-control', 'size'=>'75x5']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-lg-offset-2">
        {!! Form::submit($btnText, ['class'=>'btn btn-primary']) !!}
        <a href="{{ route('klanten.home') }}" class="btn btn-link">Annuleren</a>
    </div>
</div>