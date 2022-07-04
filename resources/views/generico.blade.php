<!DOCTYPE html>
<html lang="es">    
    @include('layouts/common/head')
    <body>
    @include('layouts/common/menu')
    @include('header/header')
    <div class="container" style="min-height: 297px">
    <p>{{$mensaje}} </p>
    </div>
    </body>
    @include('layouts/common/footer')
  @include('layouts/common/scripts')
</html>