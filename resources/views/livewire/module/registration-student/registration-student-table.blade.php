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
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRegistrasi" wire:click="resetForm">
                        <span class="bx bx-plus"></span>
                        Tambah
                    </button>
                </div>
                <div class="ms-3">
                    <button
                    class="btn btn-success"
                    data-bs-toggle="modal"
                    data-bs-target="#modalCenter">
                        <i class='bx bxs-file-pdf'></i>
                        Rekap
                    </button>
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
                        <th width="150">Kelas</th>
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
                        <td>{{ $registrasi->kelas->name ?? "Kelas Belum Dipilih" }}</td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalRegistrasi" wire:click.prevent="find({{ $registrasi->id }})">
                                <i class="bx bx-edit"></i>
                                <span>Edit</span>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" wire:click="deleteConfirm({{ $registrasi->id }})">
                                <i class="bx bx-trash"></i>
                                <span>Hapus</span>
                            </button>
                            @if ($registrasi->status == 'valid')
                            <button wire:click='getIdToClass({{ $registrasi->id }})' type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#addClass" >
                                <i class='bx bx-alarm-exclamation'></i>
                                <span>Add Kelas</span>
                            </button>
                            @endif
                            <button type="button" class="btn btn-secondary btn-sm" wire:click="pdfParent({{ $registrasi->id }})">
                                <i class='bx bxs-file-pdf' ></i>
                                <span>PDF</span>
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
            <div wire:ignore class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                <div wire:ignore class="modal-dialog modal-dialog-centered" role="document">
                  <div wire:ignore class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalCenterTitle">Rekap Registrasi Siswa</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Status</label>
                            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" wire:model='form.status'>
                              <option selected></option>
                              <option value="valid">Valid</option>
                              <option value="pending">Pending</option>
                            </select>
                        </div>
                      </div>
                      <div class="row g-2">
                        <div class="col mb-0">
                          <label for="emailWithTitle" class="form-label">Start Date</label>
                          <input
                            type="date"
                            id="emailWithTitle"
                            class="form-control"
                            wire:model='form.date_start'
                          />
                        </div>
                        <div class="col mb-0">
                          <label for="dobWithTitle" class="form-label">End Date</label>
                          <input
                            type="date"
                            id="dobWithTitle"
                            class="form-control"
                            wire:model='form.date_end'
                          />
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" id="closeModalId" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                      </button>
                    <button type="button" wire:click='save' class="btn btn-primary">
                        <i class='bx bxs-file-pdf'></i>
                        Rekap PDF
                    </button>
                    </div>
                  </div>
                </div>
              </div>
              <div wire:ignore class="modal fade" id="addClass" tabindex="-1" aria-hidden="true">
                <div wire:ignore class="modal-dialog modal-dialog-centered" role="document">
                  <div wire:ignore class="modal-content">
                    <form wire:submit='saveEdit'>
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalCenterTitle">Tambah Kelas</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Kelas</label>
                            <select wire:model='kelas' class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" wire:model='form.status'>
                                <option selected></option>
                                @foreach ($catagorryClass as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" id="closeKelas" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                      </button>
                    <button type="submit" class="btn btn-primary">
                        <i class='bx bxs-file-pdf'></i>
                        Save
                    </button>
                    </div>
                </form>
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
    $wire.on('closeModal',()=>{
        const idModalButton = document.getElementById("closeModalId")
        idModalButton.click()
    })
    $wire.on('closeModalkelas',()=>{
        const idModalButton = document.getElementById("closeKelas")
        idModalButton.click()
    })
</script>
@endscript
