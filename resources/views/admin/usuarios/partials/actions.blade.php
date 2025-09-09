{{-- partials/actions.blade.php --}}
<div class="btn-group">
    <button class="btn btn-sm {{ $user->active ? 'btn-success' : 'btn-danger' }}"
            onclick="toggleActive({{ $user->id }})">
        {{ $user->active ? 'Activo' : 'Inactivo' }}
    </button>
    <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-primary">
        Editar
    </a>
</div>

<script>
function toggleActive(userId) {
    axios.post(`/users/${userId}/toggle-active`)
        .then(response => {
            if(response.data.success) {
                $('#users-table').DataTable().ajax.reload();
            }
        });
}
</script>