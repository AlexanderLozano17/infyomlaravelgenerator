<!-- Identification Field -->
<div class="form-group col-sm-6">
    {!! Form::label('identification', 'Identification:') !!}
    {!! Form::text('identification', null, ['class' => 'form-control','minlength' => 5,'maxlength' => 10]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_name', 'First Name:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control','minlength' => 5,'maxlength' => 30]) !!}
</div>

<!-- Second Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('second_name', 'Second Name:') !!}
    {!! Form::text('second_name', null, ['class' => 'form-control','minlength' => 5,'maxlength' => 30]) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control','minlength' => 5,'maxlength' => 50]) !!}
</div>

<!-- Age Field -->
<div class="form-group col-sm-6">
    {!! Form::label('age', 'Age:') !!}
    {!! Form::text('age', null, ['class' => 'form-control','minlength' => 1,'maxlength' => 3]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('people.index') }}" class="btn btn-default">Cancel</a>
</div>
