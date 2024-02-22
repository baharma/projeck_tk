<div>
    <div class="modal fade" id="modalCaegory" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document" wire:ignore.self>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">{{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit='submitForm'>
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="emailBasic" class="form-label">Nama</label>
                                <input type="name" class="form-control" placeholder="Masukkan nama kategori..." wire:model.live='name' />
                                @error('name') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="closemodal" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Tutup
                        </button>
                        <button type="submit" class="btn btn-primary" wire:confirm="test">Simpan</button>
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
            'title': 'Berhasil membuat kategori',
            'type': 'success',
            'text': ''
        }]);
    })
    $wire.on('updateSuccess', (data) => {
        const modal = document.getElementById('closemodal');
        modal.click();

        $wire.dispatch('swal:modal', [{
            'title': 'Berhasil memperbaharui kategori',
            'type': 'success',
            'text': ''
        }]);
    })
</script>
@endscript