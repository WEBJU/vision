<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Repositories\RoleRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Laracasts\Flash\Flash;

class RoleController extends AppBaseController
{
    /** @var RoleRepository */
    private $roleRepository;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepository = $roleRepo;
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|View
     *
     * @throws Exception
     */
    public function index()
    {
        $permissions = Permission::toBase()->get();

        return view('admin.roles.index', compact('permissions'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $permissions = $this->roleRepository->getPermissions();

        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param  CreateRoleRequest  $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateRoleRequest $request)
    {
        $input = $request->all();
        $this->roleRepository->store($input);

        Flash::success('Role Created successfully');

        return redirect(route('roles.index'));
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param  Role  $role
     * @return Application|Factory|View
     */
    public function edit(Role $role)
    {
        $permissions = $this->roleRepository->getPermissions();
        $selectedPermissions = $role->getAllPermissions()->keyBy('id');

        return view('admin.roles.edit', compact('role', 'permissions', 'selectedPermissions'));
    }

    /**
     * Update the specified Role in storage.
     *
     * @param  UpdateRoleRequest  $request
     * @param  Role  $role
     * @return Application|Redirector|RedirectResponse
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $this->roleRepository->update($request->all(), $role->id);

        Flash::success('Role updated successfully');

        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param  Role  $role
     * @return JsonResponse
     */
    public function destroy(Role $role): JsonResponse
    {
        $userRole = User::where('role', $role->id);
        if ($userRole->count() > 0) {
            return $this->sendError('Assigned role can\'t be deleted.');
        }
        if ($role->is_default == 1) {
            return $this->sendError('Default role do not deleted.');
        }
        $role->delete();

        return $this->sendSuccess('Role deleted successfully.');
    }
}
