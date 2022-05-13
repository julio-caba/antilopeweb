    <!-- Header Section Begin -->
    <header class="header-section" >
        <div class="header-top">            
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img src="img/logoA.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">                            
                            <div class="input-group" style="max-width:100%;">
                                <input type="text" placeholder="Ingrese su busqueda">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right" style="font-size:.8rem;">
                        @if(Auth::check())
                        <a href="{{ url('/logout') }}"><i class="fa fa-lock mr-2"></i>{{ Auth::user()->name }} - salir</a>                        
                            @if(Auth::user()->admin)
                                <a href="{{ route('home') }}"><i class="fa fa-home ml-2"></i> Home</a>                         
                            @endif 
                            @include('layouts/common/carrito') 
                        @else
                            @if (Request::is('login'))  
                        <a href="{{ route('register') }}" class="pr-2">Registrarse</a>
                        @include('layouts/common/carrito')                                              
                        @endif 
                        @if (Request::is('register'))
                        <a href="{{ route('login') }}">Ingresar</a>  
                        @include('layouts/common/carrito') 
                        @endif
                        @if (Request::is('/') || Request::is('ayuda')  )
                        <a href="{{ route('register') }}" class="pr-2">Registrarse</a>
                        <a href="{{ route('login') }}">Ingresar</a>  
                        @include('layouts/common/carrito')                        
                        @endif       
                        @endif
                                               
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item" style="text-align:center;">
            <div class="container">                
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="#">Categorias</a></li>
                        <li><a href="#">Mas vendidos</a></li>
                        <li><a href="#">Descubri</a></li>
                        <li><a href="#">Ofertas</a></li>                        
                        <li><a href="{{ url('/ayuda') }}">Ayuda</a></li>                        
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->