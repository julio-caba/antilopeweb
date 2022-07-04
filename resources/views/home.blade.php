@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <h1>¡Bienvenido {{ auth()->user()->name }} !</h4>
    </div>
</div>
@endsection
