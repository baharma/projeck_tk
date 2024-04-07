<div>
    <form wire:submit.prevent='submitForm' enctype="multipart/form-data" method="post">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    Profil Sekolah
                </div>
                <div class="row g-2">
                    <div class="col-lg-12 mb-0">
                        <label for="emailBasic" class="form-label">Nama</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama..." wire:model='name' />
                        @error('name') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                    </div>
                    <div class="col-lg-12 mb-0">
                        <label for="emailBasic" class="form-label">Deskripsi</label>
                        <textarea wire:model='description' class="form-control" placeholder="Masukkan deskripsi..." id="" cols="30" rows="10"></textarea>
                        @error('description') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                    </div>
                    <div class="col-lg-12 mb-0">
                        <label for="emailBasic" class="form-label">Alamat</label>
                        <textarea wire:model='address' class="form-control" placeholder="Masukkan alamat..." id="" cols="30" rows="10"></textarea>
                        @error('address') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                    </div>
                    <div class="col-lg-12 mb-0">
                        <label for="emailBasic" class="form-label">Logo</label>
                        <div class="input-group">
                            <input wire:model='logo' class="form-control" type="file" id="logo">
                            @if(is_string($logo))
                            <a href="{{ asset('assets/images/' . $logo) }}" target="_blank" class="btn btn-success"><i class="bx bx-image-alt"></i> Lihat</a>
                            @endif
                        </div>
                        @error('logo') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                    </div>
                </div>

            </div>
            <div class="card-footer d-flex justify-content-end">
                <div>
                    <a class="btn btn-outline-secondary" href="{{ route('dashboard') }}">Kembali</a>
                    <button type="button" wire:click="dispatch('confirmAlert')" class="btn btn-primary">Simpan</button>
                    <button type="submit" id="companyFormSave" class="d-none"></button>
                </div>
            </div>
        </div>
    </form>
</div>

@script
<script>
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
                console.log('sdfkhsdkf');
                $('#companyFormSave').click();
            }
        });
    });

    $wire.on('updateSuccess', (data) => {

        $wire.dispatch('swal:modal', [{
            'title': 'Berhasil memperbaharui data sekolah',
            'type': 'success',
            'text': ''
        }]);

        $wire.dispatch('renderComponent');
    })
</script>
@endscript