<!-- Id Field -->
<div class="col-sm-4">
    {!! Form::label('id', 'ID de categoria:') !!}
    <p>{{ $categoria->id }}</p>
</div>
<!-- Name Field -->
<div class="col-sm-4">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{{ $categoria->name }}</p>
</div>
<!-- Descripcion Field -->
<div class="col-sm-4">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{{ $categoria->descripcion }}</p>
</div>

