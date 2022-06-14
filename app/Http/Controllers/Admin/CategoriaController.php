<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\CategoriaDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateCategoriaRequest;
use App\Http\Requests\Admin\UpdateCategoriaRequest;
use App\Repositories\Admin\CategoriaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Response;

class CategoriaController extends AppBaseController
{
    /** @var CategoriaRepository $categoriaRepository*/
    private $categoriaRepository;

    public function __construct(CategoriaRepository $categoriaRepo)
    {
        $this->categoriaRepository = $categoriaRepo;
    }

    /**
     * Display a listing of the Categoria.
     *
     * @param CategoriaDataTable $categoriaDataTable
     *
     * @return Response
     */
    public function index(CategoriaDataTable $categoriaDataTable)
    {
        $categorias = DB::table('categorias')->select('id','name')->get();
        return $categoriaDataTable->render('admin.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new Categoria.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.categorias.create');
    }

    /**
     * Store a newly created Categoria in storage.
     *
     * @param CreateCategoriaRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoriaRequest $request)
    {
        $input = $request->all();

        $categoria = $this->categoriaRepository->create($input);

        Flash::success('Categoria saved successfully.');

        return redirect(route('admin.categorias.index'));
    }

    /**
     * Display the specified Categoria.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categoria = $this->categoriaRepository->find($id);
        $categorias = $this->categoriaRepository->all();
        if (empty($categoria)) {
            Flash::error('Categoria not found');

            return redirect(route('admin.categorias.index'));
        }

        return view('admin.categorias.show', compact('categorias', 'categoria'));
    }

    /**
     * Show the form for editing the specified Categoria.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categoria = $this->categoriaRepository->find($id);

        if (empty($categoria)) {
            Flash::error('Categoria not found');

            return redirect(route('admin.categorias.index'));
        }

        return view('admin.categorias.edit')->with('categoria', $categoria);
    }

    /**
     * Update the specified Categoria in storage.
     *
     * @param int $id
     * @param UpdateCategoriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoriaRequest $request)
    {
        $categoria = $this->categoriaRepository->find($id);

        if (empty($categoria)) {
            Flash::error('Categoria not found');

            return redirect(route('admin.categorias.index'));
        }

        $categoria = $this->categoriaRepository->update($request->all(), $id);

        Flash::success('Categoria updated successfully.');

        return redirect(route('admin.categorias.index'));
    }

    /**
     * Remove the specified Categoria from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function welcomeIndex(){
        $categorias = $this->categoriaRepository->all();
        return view('welcome', compact('categorias'));
      /*   return view('welcome', ['categorias' => $categorias]); */
    }
    public function destroy($id)
    {
        $categoria = $this->categoriaRepository->find($id);

        if (empty($categoria)) {
            Flash::error('Categoria not found');

            return redirect(route('admin.categorias.index'));
        }

        $this->categoriaRepository->delete($id);

        Flash::success('Categoria deleted successfully.');

        return redirect(route('admin.categorias.index'));
    }
}
