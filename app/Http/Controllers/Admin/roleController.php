<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\roleDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateroleRequest;
use App\Http\Requests\Admin\UpdateroleRequest;
use App\Repositories\Admin\roleRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class roleController extends AppBaseController
{
    /** @var roleRepository $roleRepository*/
    private $roleRepository;

    public function __construct(roleRepository $roleRepo)
    {
        $this->roleRepository = $roleRepo;
    }

    /**
     * Display a listing of the role.
     *
     * @param roleDataTable $roleDataTable
     *
     * @return Response
     */
    public function index(roleDataTable $roleDataTable)
    {
        return $roleDataTable->render('admin.roles.index');
    }

    /**
     * Show the form for creating a new role.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created role in storage.
     *
     * @param CreateroleRequest $request
     *
     * @return Response
     */
    public function store(CreateroleRequest $request)
    {
        $input = $request->all();

        $role = $this->roleRepository->create($input);

        Flash::success('Role saved successfully.');

        return redirect(route('admin.roles.index'));
    }

    /**
     * Display the specified role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('admin.roles.index'));
        }

        return view('admin.roles.show')->with('role', $role);
    }

    /**
     * Show the form for editing the specified role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('admin.roles.index'));
        }

        return view('admin.roles.edit')->with('role', $role);
    }

    /**
     * Update the specified role in storage.
     *
     * @param int $id
     * @param UpdateroleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateroleRequest $request)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('admin.roles.index'));
        }

        $role = $this->roleRepository->update($request->all(), $id);

        Flash::success('Role updated successfully.');

        return redirect(route('admin.roles.index'));
    }

    /**
     * Remove the specified role from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('admin.roles.index'));
        }

        $this->roleRepository->delete($id);

        Flash::success('Role deleted successfully.');

        return redirect(route('admin.roles.index'));
    }
}
