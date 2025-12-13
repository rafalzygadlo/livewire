<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">PL</th>
                <th scope="col">DE</th>
                <th scope="col">EN</th>
                <th scope="col">Aktionen</th>
            </tr>
        </thead>
        <tbody>
            @foreach($words as $word)
            <tr>
                <th scope="row">{{ $word->id }}</th>
                <td>{{ $word->name_pl }}</td>
                <td>{{ $word->name_de }}</td>
                <td>{{ $word->name_en }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary" wire:click="$dispatch('showModal', { id: {{ $word->id }} })">Bearbeiten</button>
                    <button type="button" class="btn btn-sm btn-danger" wire:click="deleteWord({{ $word->id }})">Löschen</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
