<div>
    <div class="card p-2">

        <div class="card-body">
            <div class="card-title d-flex justify-content-between ">
                <div class="flex-1">
                    <span>List Pengguna</span>
                </div>
                <div class="d-flex flex-1">
                    <div>
                        <div class="input-group">
                            <input wire:model.live.debounce="search" type="text" class="form-control" id="basic-default-password12" placeholder="Cari..." aria-describedby="basic-default-password2">
                            <button class="input-group-text cursor-pointer" wire:click="$refresh"><i class="bx bx-search"></i></button>
                        </div>
                    </div>
                    <div class="ms-3">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal" wire:click="resetForm"><span class="bx bx-plus"></span> Tambah</button>
                    </div>
                </div>
            </div>

            <div class="table-responsive text-nowrap mt-5">
                <table class="table table-bordered">
                    <thead class="bg-light">
                        <tr>
                            <th width="90" scope="col">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Dibuat</th>
                            <th width="220">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $userAll as $index => $user )
                        <tr>
                            <td>{{ ($userAll->currentpage() - 1) * $userAll->perpage() + $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('Y-M-d H:i') }}</td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal" wire:click.prevent="find({{ $user->id }})">
                                    <i class="bx bx-edit"></i>
                                    <span>Edit</span>
                                </button>
                                @if(Auth::user()->id != $user->id)
                                <button type="button" class="btn btn-danger btn-sm" wire:click="deleteConfirm({{ $user->id }})">
                                    <i class="bx bx-trash"></i>
                                    <span>Hapus</span>
                                </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

                <div class="mt-5 d-flex justify-content-center">
                    {{ $userAll->links('components.pagination') }}
                </div>
            </div>
        </div>
        @livewire('module.user.component.modal-users')
    </div>

</div>


@script

<script>
    $wire.on('updateUserTable', () => {
        const closeButton = document.getElementById('closemodal');
        if (closeButton) {
            closeButton.click();
        } else {
            console.error('Button with ID "close-modal" not found');
        }
    });

    window.addEventListener('swal:confirm', (event) => {

        Swal.fire({
            title: event.detail[0].title,
            icon: "warning",
            showDenyButton: true,
            confirmButtonText: "Ya",
            denyButtonText: "Tidak",
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $wire.dispatch(event.detail[0].listener, [event.detail[0].param]);
            }
        });
    });
</script>

@endscript