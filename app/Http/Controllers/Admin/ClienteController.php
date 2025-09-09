<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\ClienteService;
use App\Services\RoleService;

use App\Models\User;


class ClienteController extends Controller
{
    protected $userService;
    protected $clienteService;
    protected $roleService;

    public function __construct(UserService $userService, ClienteService $clienteService, RoleService $roleService)
    {
        $this->userService = $userService;
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
        $roles = ['Cliente']; // Ejemplo de roles
        $users = $this->userService->getUsersByRoles($roles);

        return view('admin.clientes.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
