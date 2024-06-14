<div class="card">
    <div class="card-body">
        <div class="card-title d-flex justify-content-between ">
            <div class="flex-1">
                <span>List Registrasi Siswa</span>
            </div>
            <div class="d-flex flex-1">
                <div>
                    <div class="input-group">
                        <input wire:model.live.debounce="search" type="text" class="form-control" placeholder="Cari..." aria-describedby="basic-default-password2">
                        <button class="input-group-text cursor-pointer" wire:click="$refresh"><i class="bx bx-search"></i></button>
                    </div>
                </div>
                <div class="ms-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRegistrasi" wire:click="resetForm"><span class="bx bx-plus"></span> Tambah</button>
                </div>
            </div>
        </div>

        <div class="table-responsive text-nowrap mt-5">
            <table class="table table-bordered">
                <thead class="bg-light">
                    <tr>
                        <th width="90">No</th>
                        <th width="300">Nama</th>
                        <th width="150">Jenis Kelamin</th>
                        <th width="150">Tanggal Registrasi</th>
                        <th width="150">Status</th>
                        <th width="220">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registrations as $key => $registrasi)
                    <tr>
                        <td>{{ ($registrations->currentpage() - 1) * $registrations->perpage() + $key + 1 }}</td>
                        <td>{{ $registrasi->name }}</td>
                        <td>
                            {{ $registrasi->gender == 'laki_laki' ? 'Laki - Laki' : 'Perempuan'}}
                        </td>
                        <td>{{ $registrasi->created_at->format('Y-M-d H:i') }}</td>
                        <td>
                            <span class="badge {{ $registrasi->status == 'pending' ? 'bg-warning' : 'bg-success' }}">{{ $registrasi->status }}</span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalRegistrasi" wire:click.prevent="find({{ $registrasi->id }})">
                                <i class="bx bx-edit"></i>
                                <span>Edit</span>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" wire:click="deleteConfirm({{ $registrasi->id }})">
                                <i class="bx bx-trash"></i>
                                <span>Hapus</span>
                            </button>
                        </td>
                    </tr>
                    @endforeach

                    @if($registrations->count() == 0) 
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data</td>
                        </tr>
                    @endif

                </tbody>
            </table>
            <div class="mt-5 d-flex justify-content-center">
                {{ $registrations->links('components.pagination') }}
            </div>
        </div>
    </div>
</div>

@script
<script>
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