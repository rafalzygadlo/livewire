<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Avatar</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Aktionen</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>
                    @if ($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}" class="rounded-circle" width="40" height="40">
                    @else
                        <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">{{ substr($user->name, 0, 1) }}</div>
                    @endif
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary" wire:click="$dispatch('showUserModal', { id: {{ $user->id }} })">Bearbeiten</button>
                    <button type="button" class="btn btn-sm btn-danger" wire:click="deleteUser({{ $user->id }})">Löschen</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
