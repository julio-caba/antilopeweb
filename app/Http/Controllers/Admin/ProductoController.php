<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ProductoDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateProductoRequest;
use App\Http\Requests\Admin\UpdateProductoRequest;
use App\Repositories\Admin\ProductoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Producto;
use Response;

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

        /* $producto = $this->productoRepository->create($input); */
        /* if (!is_null($request->file('imagen'))) {
            $archivo=$request->file('imagen');
            $filename = explode(".", $archivo->getClientOriginalName());
                $fileExtension = $filename[count($filename)-1];
            $nombre_archivo = md5($producto->id.$archivo->getClientOriginalName()).'.'.$fileExtension;
            $archivo->storeAs(
                '/upload/productos/',
                $nombre_archivo,
                'public'
            );
            //Guardo el nuevo url en la BD
            DB::table('productos')->where('id', $producto->id)->update([
                'imagen' => 'storage/upload/productos/'.$nombre_archivo            
            ]);
        } */
       
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

        return redirect(route('admin.productos.index'));
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

        if (empty($producto)) {
            Flash::error('Producto not found');

            return redirect(route('admin.productos.index'));
        }

        $producto = $this->productoRepository->update($request->all(), $id);
        /* if (!is_null($request->file('imagen'))) {
            $archivo=$request->file('imagen');
            $filename = explode(".", $archivo->getClientOriginalName());
                $fileExtension = $filename[count($filename)-1];
            $nombre_archivo = md5($producto->id.$archivo->getClientOriginalName()).'.'.$fileExtension;
            $archivo->storeAs(
                '/upload/productos/',
                $nombre_archivo,
                'public'
            );
            //Guardo el nuevo url en la BD
            DB::table('productos')->where('id', $producto->id)->update([
                'imagen' => 'storage/upload/productos/'.$nombre_archivo            
            ]);
        } */
        Flash::success('Producto updated successfully.');

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
}
