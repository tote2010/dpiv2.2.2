<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;

class ClienteService
{
    public function getClientes()
    {
        return User::role('Cliente')
            ->select('users.*')  // Selecciona todas las columnas de la tabla users
            ->paginate();
            // ->orderBy('users.created_at', 'desc');  // Ordena por fecha de creación descendente
    }

    /**
     * Obtener usuarios con rol "Cliente" paginados
     *
     * @param int $perPage Número de items por página
     * @param int $page Número de página actual
     * @return LengthAwarePaginator
     */
    public function getPaginatedClientUsers(int $perPage = 15, int $page = 1): LengthAwarePaginator
    {
        return User::role('Cliente')
            ->select('users.*')  // Selecciona todas las columnas de la tabla users
            ->orderBy('users.created_at', 'desc')  // Ordena por fecha de creación descendente
            ->paginate($perPage, ['*'], 'page', $page);
    }

    public function create(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $user->syncRoles(['Cliente']);
        return $user;
    }

    public function update(User $user, array $data)
    {
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        
        $user->update($data);
        //$user->syncRoles($data['roles'] ?? []);
        return $user;
    }

    public function toggleActive(User $user)
    {
        $user->activo = !$user->activo;
        $user->save();
        return $user;
    }
}