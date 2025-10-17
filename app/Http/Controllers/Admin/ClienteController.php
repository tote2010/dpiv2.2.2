<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\ClienteService;
use App\Services\RoleService;

use App\Models\User;
use Illuminate\Auth\Events\Validated;

class ClienteController extends Controller
{
    protected $userService;
    protected $clienteService;
    protected $roleService;

    public function __construct(UserService $userService, ClienteService $clienteService, RoleService $roleService)
    {
        //$this->userService = $userService;
        $this->clienteService = $clienteService;
        $this->roleService = $roleService;
    }

    public function index(Request $request)
    {
        //$clientes = $this->clienteService::paginate(10);
        //$users = User::role('Cliente')->paginate();//$this->clienteService->getClientes();
        //$users = $this->clienteService->getPaginatedClientUsers();
        //$users = $this->roleService->filterRoles(['Cliente']);
        //dd($users);

        // Filtrar usuarios según los roles (puedes personalizar el rol aquí)
        $rol = ['Cliente']; // Ejemplo de roles
        $users = $this->clienteService->getClientes($rol);

        return view('admin.clientes.index', compact('users'));
    }

    public function create()
    {
        $rol = ['Cliente']; // Ejemplo de roles
        return view('admin.clientes.create', compact('rol'));
    }

    public function store(UserStoreRequest $request)
    {
        $this->userService->create($request->validated());
        //$this->clienteService->create($request-validated());
        return redirect()->route('admin.clientes.index')
            ->with('success', 'Cliente creado exitosamente');
    }


    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $rol = $user->getRoleNames();
        //dd($rol);
        return view('admin.clientes.edit', compact('user', 'rol'));
    }

    public function update(UserUpdateRequest $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function toggleActive(User $user)
    {
        $this->userService->toggleActive($user);
        return redirect()->route('admin.clientes.index')
            ->with('success', 'Estado actualizado exitosamente');
    }
}
