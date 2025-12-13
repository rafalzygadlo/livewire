<div class="container-fluid">
    <div class="row">
        <div class="col-auto">
            <h1>{{ __('Word') }}</h1>
        </div>
        
    </div>

    <hr>
    <div class="col">
        <button type="button" class="btn btn-primary" wire:click="openModal(0)">+</button>
    </div>
    <hr>
    

    <div class="row justify-content-center">
        <div class="h-50">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Wort</th>
                        <th scope="col">Aktionen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($words as $word)
                    <tr>
                        <th scope="row">{{ $word->id }}</th>
                        <td>{{ $word->word_pl }}</td>
                        <td>{{ $word->word_de }}</td>
                        <td>{{ $word->word_en }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" wire:click="openModal({{ $word->id }})">Bearbeiten</button>
                            <button type="button" class="btn btn-sm btn-danger" wire:click="deleteWord({{ $word->id }})">Löschen</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>   

        </div>
    </div>


    <livewire:word.word-form>


</div>



