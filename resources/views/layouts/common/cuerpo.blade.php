  <!-- Hero Section Begin -->
  <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="img/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <!-- <span>Accesorios</span> -->
                        <div class="col-lg-5 mb-3">                            
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Comprar ahora</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="img/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <!-- <span>Electrodomesticos</span> -->
                        <div class="col-lg-5">                            
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Comprar ahora</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad" id="categorias">
        <div class="container-fluid">
            <h2 class="h1" style="color: #ffa420;">Categorias</h2>
            <div class="row">
                <div class="col-lg-3">
                    <div class="single-banner">
                        <img src="img/banner-1.jpg" alt="">
                        <div class="inner-text">
                            <h4>Notebooks</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-banner">
                        <img src="img/banner-2.png" alt="">
                        <div class="inner-text">
                            <h4>Accesorios</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-banner">
                        <img src="img/banner-3.jpg" alt="">
                        <div class="inner-text">
                            <h4>Impresoras</h4>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-3">
                    <div class="single-banner">
                        <img src="img/banner-4.jpeg" alt="">
                        <div class="inner-text">
                            <h4>Otros</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->
        <!-- Banner Section Begin -->
    <div class="banner-section spad" id="mas_vendidos">
        <div class="container-fluid">
            <h2 class="h1" style="color: #ffa420;">Mas vendido</h2>
            <div class="row">
                @foreach($mas_vendidos as $producto)
                <div class="product-item">
                    <div class="pi-pic">
                        <img width="250" height="200" src="{{ asset('imgs'.$producto->imagen) }}" alt="">
                        <div class="sale">Sale</div>
                        <div class="icon">
                            <i class="icon_heart_alt"></i>
                        </div>
                        <ul>
                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                            <li class="quick-view"><a href="#">Vista Rapida</a></li>
                        </ul>
                    </div>
                    <div class="pi-text">
                        <div class="catagory-name">{{$producto->categoria->name}}</div>
                        <a href="#">
                            <h5>{{$producto->name}}</h5>
                        </a>
                        <div class="product-price">
                            ${{$producto->precio_oferta}}
                            <span>${{$producto->precio}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Women Banner Section Begin -->
    <section class="women-banner spad" id="descubri">
        <div class="container-fluid">
        <h2 class="h1" style="color: #ffa420;">Descubrí</h2>
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="img/products/women-large.jpg">
                        <h2>Dejate sorprender por nosotros</h2>
                        <a href="#">Descubri mas</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="product-slider owl-carousel">
                    @foreach($descubri as $producto)
                        <div class="product-item">
                            <div class="pi-pic">
                                <img width="250" height="200" src="{{ asset('imgs'.$producto->imagen) }}" alt="">
                                <div class="sale">Sale</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">Vista Rapida</a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">{{$producto->categoria->name}}</div>
                                <a href="#">
                                    <h5>{{$producto->name}}</h5>
                                </a>
                                <div class="product-price">
                                    ${{$producto->precio_oferta}}
                                    <span>${{$producto->precio}}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad" id="ofertas">
        <div class="container-fluid">
            <h2 class="h1" style="color: #ffa420;">¡Ofertas!</h2>
            <div class="row">
                @foreach($ofertas as $producto)
                <div class="product-item">
                    <div class="pi-pic">
                        <img width="250" height="200" src="{{ asset('imgs'.$producto->imagen) }}" alt="">
                        <div class="sale">Sale</div>
                        <div class="icon">
                            <i class="icon_heart_alt"></i>
                        </div>
                        <ul>
                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                            <li class="quick-view"><a href="#">Vista Rapida</a></li>
                        </ul>
                    </div>
                    <div class="pi-text">
                        <div class="catagory-name">{{$producto->categoria->name}}</div>
                        <a href="#">
                            <h5>{{$producto->name}}</h5>
                        </a>
                        <div class="product-price">
                            ${{$producto->precio_oferta}}
                            <span>${{$producto->precio}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Instagram Section Begin -->
    <div class="instagram-photo">
        <h2 class="h1" style="color: #ffa420;">Comunicate con nosotros</h2>
        <div class="insta-item set-bg" data-setbg="img/insta-2.jpg">
            <div class="inside-text">
                <i class="fa fa-whatsapp"></i>
                <h5><a href="#">Whatsapp</a></h5>                
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-3.jpg">
            <div class="inside-text">
                <i class="ti-email"></i>
                <h5><a href="#">E-mail</a></h5>                
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-1.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="https://www.instagram.com/" target="_blank">Instagram</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-4.jpg">
            <div class="inside-text">
                <i class="ti-facebook"></i>
                <h5><a href="https://es-la.facebook.com/" target="_blank">Facebook</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-5.jpg">
            <div class="inside-text">
                <i class="ti-twitter"></i>
                <h5><a href="https://twitter.com/?lang=es" target="_blank">Twitter</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-6.jpg">
            <div class="inside-text">
                <i class="ti-youtube"></i>
                <h5><a href="https://www.youtube.com/" target="_blank">Youtube</a></h5>                
            </div>
        </div>
    </div>
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        
        <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Envio gratis</h6>
                                <p>Para compras mayores a $9000</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Entregas a tiempo</h6>
                                <p>Tus productos llegan en el tiempo acordado</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Compra segura</h6>
                                <p>100% seguridad de su pago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Latest Blog Section End -->