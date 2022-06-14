<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\UsuarioDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateUsuarioRequest;
use App\Http\Requests\Admin\UpdateUsuarioRequest;
use App\Repositories\Admin\UsuarioRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Support\Facades\DB;

class UsuarioController extends AppBaseController
{
    /** @var UsuarioRepository $usuarioRepository*/
    private $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepo)
    {
        $this->usuarioRepository = $usuarioRepo;
    }

    /**
     * Display a listing of the Usuario.
     *
     * @param UsuarioDataTable $usuarioDataTable
     *
     * @return Response
     */
    public function index(UsuarioDataTable $usuarioDataTable)
    {
        $roles = DB::table('roles')->select('id', 'name')->get();
        return $usuarioDataTable->render('admin.usuarios.index',compact('roles'));
    }

    /**
     * Show the form for creating a new Usuario.
     *
     * @return Response
     */
    public function create()
    {
        $roles = DB::table('roles')->orderBy('name')->pluck('name','id');
        return view('admin.usuarios.create',compact('roles'));
    }

    /**
     * Store a newly created Usuario in storage.
     *
     * @param CreateUsuarioRequest $request
     *
     * @return Response
     */
    public function store(CreateUsuarioRequest $request)
    {
        $input = $request->all();

        $usuario = $this->usuarioRepository->create($input);

        Flash::success('Usuario saved successfully.');

        return redirect(route('admin.usuarios.index'));
    }

    /**
     * Display the specified Usuario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $usuario = $this->usuarioRepository->find($id);

        if (empty($usuario)) {
            Flash::error('Usuario not found');

            return redirect(route('admin.usuarios.index'));
        }

        return view('admin.usuarios.show')->with('usuario', $usuario);
    }

    /**
     * Show the form for editing the specified Usuario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $usuario = $this->usuarioRepository->find($id);
        $roles = DB::table('roles')->orderBy('name')->pluck('name','id');
        if (empty($usuario)) {
            Flash::error('Usuario not found');

            return redirect(route('admin.usuarios.index'));
        }

        return view('admin.usuarios.edit',compact('usuario','roles'));
    }

    /**
     * Update the specified Usuario in storage.
     *
     * @param int $id
     * @param UpdateUsuarioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsuarioRequest $request)
    {
        $usuario = $this->usuarioRepository->find($id);

        if (empty($usuario)) {
            Flash::error('Usuario not found');

            return redirect(route('admin.usuarios.index'));
        }

        $usuario = $this->usuarioRepository->update($request->all(), $id);

        Flash::success('Usuario updated successfully.');

        return redirect(route('admin.usuarios.index'));
    }

    /**
     * Remove the specified Usuario from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $usuario = $this->usuarioRepository->find($id);

        if (empty($usuario)) {
            Flash::error('Usuario not found');

            return redirect(route('admin.usuarios.index'));
        }

        $this->usuarioRepository->delete($id);

        Flash::success('Usuario deleted successfully.');

        return redirect(route('admin.usuarios.index'));
    }
}
