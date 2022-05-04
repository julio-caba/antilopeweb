<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>
<!-- Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo', 'Codígo:') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
</div>
<!-- Costo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('costo', 'Costo de compra:') !!}
    {!! Form::number('costo', null, ['class' => 'form-control','step'=>'any']) !!}
</div>
<!-- Precio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precio', 'Precio final:') !!}
    {!! Form::number('precio', null, ['class' => 'form-control','step'=>'any']) !!}
</div>
<!-- id Categoria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_categoria', 'ID de categoria:') !!}
    {!! Form::number('id_categoria', null, ['class' => 'form-control','step'=>'any']) !!}
</div>
<!-- Stock Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock', 'Stock disponible:') !!}
    {!! Form::number('stock', null, ['class' => 'form-control']) !!}
</div>
<!-- Imagen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imagen', 'Imagen:') !!}
    <div>
    {!! Form::file('imagen', null) !!}
    </div>    
</div>