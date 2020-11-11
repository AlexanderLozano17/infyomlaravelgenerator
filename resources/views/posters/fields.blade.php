<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control','minlength' => 2,'maxlength' => 500]) !!}
</div>

<!-- Body Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control','minlength' => 2,'maxlength' => 255]) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-12">
    {!! Form::label('state', 'State:') !!}
    <label class="radio-inline">
        {!! Form::radio('state', "1", null) !!} Activo
    </label>

    <label class="radio-inline">
        {!! Form::radio('state', "0", null) !!} Inactivo
    </label>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('posters.index') }}" class="btn btn-default">Cancel</a>
</div>
