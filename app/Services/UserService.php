<?php 

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * Obtener usuarios según roles específicos.
     *
     * @param array|string $roles El nombre del rol o roles a filtrar
     * @return \Illuminate\Support\Collection
     */
    public function getUsersByRoles($roles)
    {
        // Asegura que $roles sea un array
        $roles = is_array($roles) ? $roles : [$roles];

        // Consulta los usuarios que tienen los roles especificados
        return User::role($roles)->get();
    }

    public function create(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $user->syncRoles($data['roles'] ?? []);
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