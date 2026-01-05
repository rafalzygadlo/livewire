<div wire:ignore.self class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="userModalLabel">{{ $edit ? 'Edit User' : 'Add New User' }}</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form wire:submit.prevent="save">

                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name">
                  @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input wire:model="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <hr>
                <p class="text-muted">{{ $edit ? 'Wypełnij poniższe pola tylko, jeśli chcesz zmienić hasło.' : 'Ustaw hasło dla nowego użytkownika.' }}</p>

                <div class="mb-3">
                    <label for="password" class="form-label">Hasło</label>
                    <input wire:model="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Potwierdź hasło</label>
                    <input wire:model="password_confirmation" type="password" class="form-control" id="password_confirmation">
                </div>

              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button wire:click="save" type="button" class="btn btn-primary">{{ $edit ? 'Update' : 'Save' }}</button>
        </div>
      </div>
    </div>
  </div>

  @push('scripts')
  <script>
        document.addEventListener('livewire:init', () => {
            const userModal = new bootstrap.Modal(document.getElementById('userModal'));

            window.addEventListener('open-user-modal', event => {
                userModal.show();
            });

            window.addEventListener('close-user-modal', event => {
                userModal.hide();
            });
        });
    </script>
  @endpush
