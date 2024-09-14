<div>
    <form wire:submit.prevent='submitForm' enctype="multipart/form-data" method="post">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    Sosial Media
                </div>
                <div class="divider text-start">
                    <div class="divider-text">Facebook</div>
                </div>
                <div class="row g-2">
                    <div class="col-lg-12 mb-0">
                        <label class="form-label">Nama Facebook</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama facebook..." wire:model='social_medias.0.name' />
                        <input type="hidden" wire:model='social_medias.0.slug' value="facebook" />
                    </div>
                    <div class="col-lg-12 mb-0">
                        <label class="form-label">Link</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bxl-facebook-circle"></i></span>
                            <input wire:model='social_medias.0.url' placeholder="Masukkan link..." class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="divider text-start mt-5">
                    <div class="divider-text">Instagam</div>
                </div>
                <div class="row g-2">
                    <div class="col-lg-12 mb-0">
                        <label class="form-label">Nama Instagram</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama instagram..." wire:model='social_medias.1.name' />
                        <input type="hidden" wire:model='social_medias.1.slug' value="instagram" />
                    </div>
                    <div class="col-lg-12 mb-0">
                        <label class="form-label">Link</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bxl-instagram-alt"></i></span>
                            <input wire:model='social_medias.1.url' placeholder="Masukkan link..." class="form-control" type="text">
                        </div>
                    </div>
                </div>

                <div class="divider text-start mt-5">
                    <div class="divider-text">Whatsapp</div>
                </div>
                <div class="row g-2">
                    <div class="col-lg-12 mb-0">
                        <label class="form-label">Nama Whatsapp</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama whatsapp..." wire:model='social_medias.2.name' />
                        <input type="hidden" wire:model='social_medias.2.slug' value="whatsapp" />
                    </div>
                    <div class="col-lg-12 mb-0">
                        <label class="form-label">Link</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bxl-whatsapp"></i></span>
                            <input wire:model='social_medias.2.url' placeholder="Masukkan link..." class="form-control" type="text">
                        </div>
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
            'title': 'Berhasil memperbaharui sosial media',
            'type': 'success',
            'text': ''
        }]);

        $wire.dispatch('renderComponent');
    })
</script>
@endscript