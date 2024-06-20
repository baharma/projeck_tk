<div>
    <div class="modal fade" id="modalGallery" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document" wire:ignore.self>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">{{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit='submitForm'>
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="col-12 mb-2">
                                <label for="emailBasic" class="form-label">Nama</label>
                                <input type="name" class="form-control" placeholder="Masukkan nama galeri..." wire:model.live='name' />
                                @error('name') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                            </div>
                            <div class="col-12 mb-2">
                                <label for="emailBasic" class="form-label">Gambar</label>
                                <div class="input-group">
                                    <input wire:model.live='url' class="form-control" type="file" id="url">
                                    @if(is_string($url))
                                    <a href="{{ asset('assets/images/'.$url) }}" target="_blank" class="btn btn-success"><i class="bx bx-image-alt"></i> Lihat</a>
                                    @endif
                                </div>
                                @error('url') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                            </div>
                            <div class="col-12 mb-2">

                                @php 
                                    $idCheckbox1 = rand();
                                @endphp
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="{{ $idCheckbox1 }}" wire:model.live='pinned' {{ $pinned == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="{{ $idCheckbox1 }}"> Tampilkan gambar pada website </label>
                                </div>
                                @error('pinned') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                            </div>
                            <div class="col-12 mb-2">
                                @php 
                                    $idCheckbox2 = rand();
                                @endphp
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="{{ $idCheckbox2 }}" wire:model.live='is_banner' {{ $is_banner == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="{{ $idCheckbox2 }}"> Jadikan sebagai banner </label>
                                </div>
                                @error('is_banner') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="closemodal" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Tutup
                        </button>
                        <button type="button" class="btn btn-primary" wire:click="dispatch('confirmAlert')">Simpan</button>
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
            'title': 'Berhasil membuat galeri',
            'type': 'success',
            'text': ''
        }]);
    })
    $wire.on('updateSuccess', (data) => {
        const modal = document.getElementById('closemodal');
        modal.click();

        $wire.dispatch('swal:modal', [{
            'title': 'Berhasil memperbaharui galeri',
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