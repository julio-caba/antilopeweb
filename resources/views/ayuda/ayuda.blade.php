<!DOCTYPE html>
<html lang="es">    
    @include('layouts/common/head')
    <body>
    @include('layouts/common/menu')
    @include('header/header')
    <div class="container">
    <h2 class="pb-2 pt-2">Centro de ayuda </h2>   
    <div class="row pl-2 pt-2 pb-2">
    <p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid rerum corrupti et repellendus ipsa sequi explicabo dolores! Atque reprehenderit deserunt eos quia eius incidunt quisquam, dolorem ducimus, voluptate quis odit!
    </p>
    </div> 

    <div class="container box">
      @if(count($errors) > 0)
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif


      @if($message = Session::get('success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <stron>{{ $message }}</strong>
        </div>
      @endif
      <form method ="POST" action="{{ url('contacto/enviar_mail') }}">
        {{ csrf_field() }}
        <div class="form-group">
          <lable>Tu nombre</lable>
          <input type="text" name="nombre" class="form-control"/ required>
        </div>

        <div class="form-group">
          <lable>Tu email</lable>
          <input type="email" name="email" class="form-control"/ required>
        </div>

        <div class="form-group">
          <lable>¿En qué te podemos ayudar? </lable>
          <textarea name="mensaje" class=" form-control" required></textarea>
        </div>

        <div class="form-group">
          <input type="submit" name="send" value="Enviar" class="btn btn-danger"/ >
        </div>
      </form>
      
    </div>
    
    </div>
    @include('layouts/common/footer')
  @include('layouts/common/scripts')
    </body>
</html>