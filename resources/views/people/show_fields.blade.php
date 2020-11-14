<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $person->id }}</p>
</div>

<!-- Identification Field -->
<div class="form-group">
    {!! Form::label('identification', 'Identification:') !!}
    <p>{{ $person->identification }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $person->email }}</p>
</div>

<!-- First Name Field -->
<div class="form-group">
    {!! Form::label('first_name', 'First Name:') !!}
    <p>{{ $person->first_name }}</p>
</div>

<!-- Second Name Field -->
<div class="form-group">
    {!! Form::label('second_name', 'Second Name:') !!}
    <p>{{ $person->second_name }}</p>
</div>

<!-- Last Name Field -->
<div class="form-group">
    {!! Form::label('last_name', 'Last Name:') !!}
    <p>{{ $person->last_name }}</p>
</div>

<!-- Age Field -->
<div class="form-group">
    {!! Form::label('age', 'Age:') !!}
    <p>{{ $person->age }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $person->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $person->updated_at }}</p>
</div>

