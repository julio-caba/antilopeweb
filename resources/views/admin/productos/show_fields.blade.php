<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{{ $producto->name }}</p>
</div>

<!-- Descripcion Field -->
<div class="col-sm-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{{ $producto->descripcion }}</p>
</div>

<!-- Costo Field -->
<div class="col-sm-12">
    {!! Form::label('costo', 'Costo de compra:') !!}
    <p>${{ $producto->costo }}</p>
</div>

<!-- Precio Field -->
<div class="col-sm-12">
    {!! Form::label('precio', 'Precio de venta:') !!}
    <p>${{ $producto->precio }}</p>
</div>

<!-- Cat Producto Field -->
<div class="col-sm-12">
    {!! Form::label('cat_producto', 'ID de categoria:') !!}
    <p>{{ $producto->id_categoria }}</p>
</div>

<!-- Stock Field -->
<div class="col-sm-12">
    {!! Form::label('stock', 'Stock:') !!}
    <p>{{ $producto->stock }} unidades</p>
</div>


