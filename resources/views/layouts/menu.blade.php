<li class="nav-item mt-1 {{ Request::is('/home') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('home') }}">
        <i class="fas fa-home" style="text-align: center; margin-right: .4em; margin-left: .2em;"></i><p  align="right">Inicio</p>
    </a>
</li>
<li class="nav-item mt-1 {{ Request::is('admin/categorias*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.categorias.index') }}">
        <i class="fas fa-bookmark" style="text-align: center; margin-right: .4em; margin-left: .2em;"></i><p  align="right">Categorias</p>
    </a>
 </li>
<li class="nav-item mt-1 {{ Request::is('admin/productos*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.productos.index') }}">
        <i class="fas fa-box" style="text-align: center; margin-right: .4em; margin-left: .2em;"></i><p  align="right">Productos</p>
    </a>
 </li>
