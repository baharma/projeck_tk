<div>
    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document" wire:ignore.self>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">{{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit='submitForm'>
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="col-12 mb-0">
                                <label for="emailBasic" class="form-label">Nama</label>
                                <input type="name" class="form-control" placeholder="Cth: Agus" wire:model.live='name' />
                                @error('name') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                            </div>
                            <div class="col-12 mb-0">
                                <label for="emailBasic" class="form-label">Email</label>
                                <input type="Email" class="form-control" placeholder="Cth: email@example.com" wire:model.live='email' />
                                @error('email') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                            </div>
                            <div class="col-12 mb-0">
                                @if(!is_null($id))
                                <label for="dobBasic" class="form-label">Ganti Password</label>
                                <input type="password" class="form-control" placeholder="Masukkan password baru..." wire:model.live='password' />
                                @else
                                <label for="dobBasic" class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="Masukkan password..." wire:model.live='password' />
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="closemodal" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" wire:click="dispatch('confirmAlert')" class="btn btn-primary">Simpan</button>
                        <button type="submit" id="regisButton" class="d-none"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@script
<script>
    $wire.on('createSuccess', (data) => {
        const modal = document.getElementById('closemodal');
        modal.click();

        $wire.dispatch('swal:modal', [{
            'title': 'Berhasil membuat pengguna',
            'type': 'success',
            'text': ''
        }]);
    })
    $wire.on('updateSuccess', (data) => {
        const modal = document.getElementById('closemodal');
        modal.click();

        $wire.dispatch('swal:modal', [{
            'title': 'Berhasil memperbaharui pengguna',
            'type': 'success',
            'text': ''
        }]);
    })
    $wire.on('confirmAlert', (data) => {
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak"
        }).then((result) => {
            if (result.isConfirmed) {
                $('#regisButton').click();
            }
        });
    })
</script>
@endscript