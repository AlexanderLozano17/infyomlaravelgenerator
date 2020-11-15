<!-- Operation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('operation', 'Operation:') !!}
    {!! Form::text('operation', null, ['class' => 'form-control','minlength' => 5,'maxlength' => 50]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('operations.index') }}" class="btn btn-default">Cancel</a>
</div>
