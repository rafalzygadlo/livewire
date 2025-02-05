
<div wire:ignore.self class="modal fade" id="wordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
          <button  type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <form>
                
                <div class="mb-3">
                  <label class="form-label">name PL</label>
                  <input wire:model="name_pl" type="text" class="form-control @error('name_pl') is-invalid @enderror" >
                  @error('name_pl')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">name DE</label>
                    <input wire:model="name_de" type="text" class="form-control @error('name_de') is-invalid @enderror" >
                    @error('name_de')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">name EN</label>
                    <input wire:model="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror" >
                    @error('name_en')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

              </form>
        </div>
        <div class="modal-footer">
          <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>   
          @if($edit)
          <button wire:click="update" type="button" class="btn btn-primary">update</button>
          @else
          <button wire:click="save" type="button" class="btn btn-primary">Save changes</button>
          @endif
        </div>
      </div>
    </div>
  </div>
  <script>
        document.addEventListener('DOMContentLoaded', function () {
            var myModal = new bootstrap.Modal(document.getElementById('wordModal'));

            Livewire.on('showModal', function () {
                myModal.show();
            });

            Livewire.on('hideModal', function () {
                myModal.hide();
            });
        });
    </script>