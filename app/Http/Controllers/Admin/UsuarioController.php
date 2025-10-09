<?php

// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

// use App\Models\User;
// use App\Models\Role;
// use App\Services\UserService;
// use App\Http\Requests\UserStoreRequest;
// use App\Http\Requests\UserUpdateRequest;
// //use DataTables;
// use Yajra\DataTables\Facades\DataTables;


// class UsuarioController extends Controller
// {
//     protected $userService;

//     public function __construct(UserService $userService)
//     {
//         $this->userService = $userService;
//     }

//     public function index(Request $request)
//     {
//         // if ($request->ajax()) {
//         //     return $this->userService->getDatatable();
//         // }
//         // return view('admin.usuarios.index');

//         if ($request->ajax()) {
//             $data = User::select(['id', 'name', 'last_name', 'email', 'activo']);
//             return DataTables::of($data)
//                 ->addColumn('action', function ($row) {
//                     $editBtn = '<a href="' . route('admin.usuarios.edit', $row->id) . '" class="btn btn-primary btn-sm">Editar</a>';
//                     $activeBtn = $row->is_active
//                         ? '<button class="btn btn-warning btn-sm">Desactivar</button>'
//                         : '<button class="btn btn-success btn-sm">Activar</button>';
//                     return $editBtn . ' ' . $activeBtn;
//                 })
//                 ->editColumn('activo', function ($row) {
//                     return $row->is_active ? 'Sí' : 'No';
//                 })
//                 ->rawColumns(['action'])
//                 ->make(true);
//             }
//             return view('admin.usuarios.index');
//     }

//     public function create()
//     {
//         // $usuarios = User::all();
//         // return view('admin.usuarios.create', compact('usuarios'));
//         $roles = Role::all();
//         return view('admin.usuarios.create', compact('roles'));
//     }

//     public function store(UserStoreRequest $request)
//     {
//         $this->userService->create($request->validated());
//         return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente');
//     }

//     public function show(string $id)
//     {
//         //
//     }

//     public function edit(User $user)
//     {
//         $roles = Role::all();
//         return view('users.edit', compact('user', 'roles'));
//     }

//     public function update(UserUpdateRequest $request, User $user)
//     {
//         $this->userService->update($user, $request->validated());
//         return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente');
//     }
    
//     public function toggleActive(User $user)
//     {
//         $this->userService->toggleActive($user);
//         return response()->json(['success' => true]);
//     }

//     public function destroy(string $id)
//     {
//         //
//     }
// }


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;
use App\Services\UserService;
use App\Services\RoleService;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
//use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;

class UsuarioController extends Controller
{
    protected $userService;
    protected $roleService;

    public function __construct(UserService $userService, RoleService $roleService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
        
    }

    public function index()
    {
        //$users = User::all(); //paginate(10);
        //dd($users);

        // Filtrar usuarios según los roles (puedes personalizar el rol aquí)
        $roles = ['Admin', 'Empleado']; // Ejemplo de roles
        $users = $this->userService->getUsersByRoles($roles);

        return view('admin.usuarios.index', compact('users'));
    }

    public function create()
    {
        //$roles = Role::all();
        $roles = ['Admin', 'Empleado']; // Ejemplo de roles
        $users = $this->userService->getUsersByRoles($roles);
        //dd($users);
        return view('admin.usuarios.create', compact('users', 'roles'));
    }

    public function store(UserStoreRequest $request)
    {
        $this->userService->create($request->validated());
        return redirect()->route('admin.usuarios.index')
            ->with('success', 'Usuario creado exitosamente');
    }

    public function edit(User $user)
    {
        $rol = $user->getRoleNames();
        //dump($rol);
        // $roles = Role::all();
        // Aplica los filtros pasados en la solicitud
        //$roles = $this->roleService->filterRoles($request->only('name'));
        $roles = $this->roleService->filterRoles(['Admin', 'Empleado', 'Cliente']);
        //dump($roles);
        return view('admin.usuarios.edit', compact('user', 'rol', 'roles'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        try {
            $this->userService->update($user, $request->validated());
            return redirect()->route('admin.usuarios.index')
                ->with('success', 'Usuario actualizado exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('admin.usuarios.edit')
                ->with('error', 'Error:' . $e->getMessage());
            Log::error($e->getMessage());
            //dd($e->getMessage());
        }
    }

    public function toggleActive(User $user)
    {
        $this->userService->toggleActive($user);
        return redirect()->route('admin.usuarios.index')
            ->with('success', 'Estado actualizado exitosamente');
    }
}