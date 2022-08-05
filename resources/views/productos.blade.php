<!DOCTYPE html>
<html lang="es">    
    @include('layouts/common/head')
    <body>
    @include('layouts/common/menu')
    @include('header/header')
    <!-- Banner Section Begin -->
    <div class="banner-section spad" id="mas_vendidos">
        <div class="container-fluid">
            <h2 class="h1" style="color: #ffa420;">{{$titulo->name}}</h2>
            <div class="row">
                @foreach($productos as $producto)
                <div class="product-item">
                    <div class="pi-pic">
                        <img width="250" height="200" src="{{ asset('imgs/'.$producto->imagen) }}" alt="">
                        @if($producto->oferta)
                        <div class="sale">Sale</div>
                        @endif
                        <div class="icon">
                            <i class="icon_heart_alt"></i>
                        </div>
                        <ul>
                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                            <li class="quick-view"><a href="{{ url('/producto/'.$producto->id) }}">Vista Rapida</a></li>
                        </ul>
                    </div>
                    <div class="pi-text">
                        <div class="catagory-name">{{$producto->categoria->name}}</div>
                        <a href="#">
                            <h5>{{$producto->name}}</h5>
                        </a>
                        @if($producto->oferta)
                        <div class="product-price">
                            ${{$producto->precio_oferta}}
                            <span>${{$producto->precio}}</span>
                        </div>
                        @else
                        <div class="product-price">
                            ${{$producto->precio_oferta}}
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Banner Section End -->
    </body>
    @include('layouts/common/footer')
  @include('layouts/common/scripts')
</html>