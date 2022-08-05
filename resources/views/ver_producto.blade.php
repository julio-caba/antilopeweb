<!DOCTYPE html>
<html lang="es">    
    @include('layouts/common/head')
    <body>
    @include('layouts/common/menu')
    @include('header/header')
    <div class="container-fluid-individual">
            <h2 class="h1">{{$producto->name}}</h2>
            <div class="container-fluid" >
              <img width="250" height="200" src="{{ asset('imgs/'.$producto->imagen) }}" alt="">

            </div>
    </div>
    </body>
    @include('layouts/common/footer')
  @include('layouts/common/scripts')
</html>