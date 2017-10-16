<div class="row">
    <table>
        <tr>
            <td>
                {{ Form::label ('criterium', 'Selectie criteria:&nbsp;', ['class'=>'label-control']) }}
            </td>
            <td>{{ Form::radio('criterium', '1', true) }} &nbsp;Maand&nbsp;
                {{ Form::radio('criterium', '2') }} &nbsp;Kwartaal&nbsp;
                {{ Form::radio('criterium', '3') }} &nbsp;Jaar&nbsp;
            </td>
            <td>
                &nbsp;
            </td>
            <td>
                {{ Form::label ('startjaar', 'Start jaar:&nbsp;', ['class'=>'label-control']) }}
            </td>
            <td>
                {{ Form::text('startjaar', null, ['class'=>'form-control']) }}
            </td>
            <td>
                {{ Form::label ('eindjaar', 'Eind jaar:&nbsp;', ['class'=>'label-control']) }}
            </td>
            <td>
                {{ Form::text('eindjaar', null, ['class'=>'form-control']) }}
            </td>
            <td>
                <a href="#" onClick = "berekenen();" class="btn btn-primary">Bereken</a>
            </td>
        </tr>
    </table>
</div>

<hr>
