<div class="card">
    <form id="registrationStudentForm" wire:submit="submitForm">
        <div class="card-body">
            @include('livewire.module.registration-student.form-registration')
        </div>
        <div class="card-footer">
            <button type="button" wire:click="dispatch('confirmAlert')" class="btn btn-pink w-full mb-3">Simpan</button>
            <button type="reset" class="btn btn-outline-secondary w-full">Bersihkan Form</button>
            <button type="submit" id="regisButton" class="d-none"></button>
        </div>
    </form>
</div>

@script
<script>
    $wire.on('createSuccess', (data) => {

        Swal.fire({
            customClass: {
                container: 'my-swal'
            },
            title: 'Pendaftaran Berhasil',
            text: '',
            icon: 'success',
        })
        .then((result) => {
            window.location.href = window.origin;
        })

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

    window.addEventListener('swal:modal', (event) => {
        Swal.fire({
            customClass: {
                container: 'my-swal'
            },
            title: event.detail[0].title,
            text: event.detail[0].text,
            icon: event.detail[0].type,
        })
    })
</script>
@endscript