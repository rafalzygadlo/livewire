<div class="container-fluid">
    <div class="row">
        <div class="col-auto">
            <h1>{{ __('Word') }}</h1>
        </div>
        
    </div>

    <div class="col">
        <button class="btn btn-primary" onclick="Livewire.emitTo('word.edit', 'open')">New</button>  
    </div>

    <hr>
    
    <div class="row justify-content-center">
        <div class="h-50">
            <livewire:word.word-table />
        </div>
    </div>

</div>


