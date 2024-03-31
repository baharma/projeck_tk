<div>
    <div class="modal fade" id="modalRegistrasi" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered  modal-lg" role="document" wire:ignore.self>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">{{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="registrationStudentForm" wire:submit="submitForm">
                    <div class="modal-body">
                        @include('livewire.module.registration-student.form-registration')
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="closemodal" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Tutup
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
            'title': 'Berhasil membuat registrasi',
            'type': 'success',
            'text': ''
        }]);
    })
    $wire.on('updateSuccess', (data) => {
        const modal = document.getElementById('closemodal');
        modal.click();

        $wire.dispatch('swal:modal', [{
            'title': 'Berhasil memperbaharui registrasi',
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