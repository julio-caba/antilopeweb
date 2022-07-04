<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ProductoDataTable;
use App\Http\Requests\Admin;
use App\Models\Admin\Producto;
use App\Models\Admin\Categoria;
use App\Http\Requests\Admin\CreateProductoRequest;
use App\Http\Requests\Admin\UpdateProductoRequest;
use App\Repositories\Admin\ProductoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Response;
use Illuminate\Support\Str;

class ProductoController extends AppBaseController
{
    /** @var ProductoRepository $productoRepository*/
    private $productoRepository;

    public function __construct(ProductoRepository $productoRepo)
    {
        $this->productoRepository = $productoRepo;
    }

    /**
     * Display a listing of the Producto.
     *
     * @param ProductoDataTable $productoDataTable
     *
     * @return Response
     */
    public function index(ProductoDataTable $productoDataTable)
    {
        $categorias = DB::table('categorias')
        ->select('id', 'name')
        ->get();  
        return $productoDataTable->render('admin.productos.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new Producto.
     *
     * @return Response
     */
    public function create()
    {
        $categorias = DB::table('categorias')->orderBy('name')->pluck('name','id');
        
        return view('admin.productos.create', compact('categorias'));
    }

    /**
     * Store a newly created Producto in storage.
     *
     * @param CreateProductoRequest $request
     *
     * @return Response
     */
    public function store(CreateProductoRequest $request)
    {
        $input = $request->all();      
       
        $producto = new Producto();
        $imagenes = $request->file('imagen');
        $nombre = time().'.'.$imagenes->getClientOriginalExtension();
        $destino = public_path('imgs');
        $request ->imagen->move($destino,$nombre);

        $producto::create([
	        "name" => $request->name,
            "descripcion" => $request->descripcion,
            "codigo" => $request->codigo,
            "costo" => $request->costo,
            "precio" => $request->precio,
	        "imagen" => $nombre,
            "id_categoria" => $request->id_categoria,
            "stock" => $request->stock,
        ]);

        Flash::success('Producto saved successfully.');

        return redirect(route('admin.productos.index', compact('producto')));
    }

    /**
     * Display the specified Producto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $producto = $this->productoRepository->find($id);

        if (empty($producto)) {
            Flash::error('Producto not found');
            return redirect(route('admin.productos.index'));
        }
        return view('admin.productos.show')->with('producto', $producto);
    }

    public function ver_mas_vendidos()
    {
        $categorias = Categoria::all();

        //Aca los mas vendidos deberan ser
        $productos = Producto::all();
        return view('productos', compact(['productos', $productos], ['categorias', $categorias]));
    }

    public function al_azar()
    {
        $categorias = Categoria::all();

        //Aca los mas vendidos deberan ser
        $productos = Producto::all();
        return view('productos', compact(['productos', $productos], ['categorias', $categorias]));
    }

    public function oferta()
    {
        $categorias = Categoria::all();

        //Aca los mas vendidos deberan ser
        $productos = Producto::where('oferta', '=', 1)->get();
        return view('productos', compact(['productos', $productos], ['categorias', $categorias]));
    }

    /**
     * Show the form for editing the specified Producto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $producto = $this->productoRepository->find($id);
   /*      $producto = new Producto(); */
        $producto = $producto::findOrFail($id);
 
        $categorias = DB::table('categorias')->orderBy('name')->pluck('name','id');
        if (empty($producto)) {
            Flash::error('Producto not found');

            return redirect(route('admin.productos.index'));
        }

        return view('admin.productos.edit', compact('categorias','producto'));
    }

    /**
     * Update the specified Producto in storage.
     *
     * @param int $id
     * @param UpdateProductoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductoRequest $request)
    {
        $producto = $this->productoRepository->find($id);
       /*  $producto = new Producto(); */
        if (empty($producto)) {
            Flash::error('Producto not found');

            return redirect(route('admin.productos.index'));
        }

        $producto = $this->productoRepository->update($request->all(), $id);
        $prod = Producto::find($id);
        $nombre = '';
        if ($request->hasFile('imagen')){
            $imagenes = $request->file('imagen');
            /* $nombreFoto=time().$archivoFoto->getClientOriginalName();  */
            $nombre = time().'.'.$imagenes->getClientOriginalExtension();
            /* $destino->move(public_path().'/imgs/', $nombre); */
            $destino = public_path('imgs');
            $request->imagen->move($destino,$nombre);
        }
        Flash::success('Producto updated successfully.');
        $prod->imagen = $nombre; 
        $prod->save();
        return redirect(route('admin.productos.index'));
    }

    /**
     * Remove the specified Producto from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $producto = $this->productoRepository->find($id);

        if (empty($producto)) {
            Flash::error('Producto not found');

            return redirect(route('admin.productos.index'));
        }

        $this->productoRepository->delete($id);

        Flash::success('Producto deleted successfully.');

        return redirect(route('admin.productos.index'));
    }

    public function ver_individual($id)
    {
        $categorias = Categoria::all();
        $producto = Producto::find($id);
        return view('ver_producto', compact(['producto', $producto], ['categorias', $categorias]));
    }
}
