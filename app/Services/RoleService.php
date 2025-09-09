<?php

namespace App\Services;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class RoleService
{
    /**
     * Filtra los roles del sistema según los criterios especificados.
     *
     * @param array $filters
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function filterRoles(array $filters = [])
    {
        $query = Role::query();

        // Filtro por nombre (si se proporciona)
        if (isset($filters['name'])) {
            $query->where('name', 'LIKE', '%' . $filters['name'] . '%');
        }

        // Puedes agregar más filtros aquí si es necesario

        return $query->get();
    }

    /**
     * Obtener todos los roles excepto super-admin
     */
    public function getAllExceptSuperAdmin(): Collection
    {
        return Role::where('name', '!=', 'Superadmin')->get();
    }

    /**
     * Obtener roles por nivel de acceso
     */
    public function getRolesByAccessLevel(int $level): Collection
    {
        return Role::where('access_level', '<=', $level)->get();
    }

    /**
     * Obtener roles asignables por el usuario actual
     */
    public function getAssignableRoles(): Collection
    {
        //$user = auth()->user();
        $user = Auth::user();
        
        if (!$user) {
            return collect(); // Retorna colección vacía si no hay usuario autenticado
        }
        
        if ($user->hasRole('super-admin')) {
            return Role::all();
        }

        if ($user->hasRole('admin')) {
            return $this->getAllExceptSuperAdmin();
        }

        return Role::whereIn('name', ['user', 'guest'])->get();
    }

    /**
     * Obtener roles por tipo de usuario
     */
    public function getRolesByType(string $type): Collection
    {
        return Role::where('type', $type)->get();
    }

    /**
     * Buscar roles por nombre
     */
    public function searchRoles(string $search): Collection
    {
        return Role::where('name', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%")
                  ->get();
    }

    /**
     * Obtener roles activos
     */
    public function getActiveRoles(): Collection
    {
        return Role::where('active', true)->get();
    }

    /**
     * Obtener roles con permisos específicos
     */
    public function getRolesByPermission(string $permission): Collection
    {
        return Role::whereHas('permissions', function($query) use ($permission) {
            $query->where('name', $permission);
        })->get();
    }

    /**
     * Obtener roles jerárquicos
     */
    public function getHierarchicalRoles(): array
    {
        $roles = Role::all();
        return $this->buildHierarchy($roles);
    }

    /**
     * Construir jerarquía de roles
     */
    private function buildHierarchy(Collection $roles, ?string $parentRole = null): array
    {
        $hierarchy = [];
        
        foreach ($roles as $role) {
            if ($role->parent_role === $parentRole) {
                $children = $this->buildHierarchy($roles, $role->name);
                $hierarchy[] = [
                    'role' => $role,
                    'children' => $children
                ];
            }
        }
        
        return $hierarchy;
    }

    /**
     * Verificar si un rol puede ser asignado por el usuario actual
     */
    public function canAssignRole(Role $role): bool
    {
        $user = auth()->user();
        
        if ($user->hasRole('super-admin')) {
            return true;
        }

        if ($role->name === 'super-admin') {
            return false;
        }

        if ($user->hasRole('admin') && !in_array($role->name, ['super-admin', 'admin'])) {
            return true;
        }

        return false;
    }
}
