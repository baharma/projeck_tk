<div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-row-reverse">
                <div class="p-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                        <i class='bx bx-message-square-add'></i>
                        Add New Class
                    </button>
                </div>

              </div>
            <table class="table table-bordered">
                <thead class="bg-light">
                    <tr>
                        <th width="90">No</th>
                        <th>Nama</th>
                        <th width="220">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($classCategory as $key => $category)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                           <div class="d-flex">
                            <button type="button" class="btn btn-danger me-2 d-flex"    @click="$dispatch('confirmAlert', {{ json_encode($category->id) }})">
                                <i class='bx bx-trash' ></i>
                                Delete
                            </button>
                            <button type="button"  class="btn btn-success d-flex" data-bs-toggle="modal" data-bs-target="#modalCenter" wire:click='getIdUpdate({{ $category->id }},"{{ $category->name }}")'>
                                <i class='bx bx-edit-alt' ></i>
                                Edit
                            </button>
                           </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div wire:ignore class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div wire:ignore class="modal-dialog modal-dialog-centered" role="document">
                <form wire:submit='save'>
              <div wire:ignore class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalCenterTitle">Kelas Siswa</h5>
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
                        <label for="exampleFormControlSelect1" class="form-label">Name Class</label>
                        <input type="name" class="form-control" placeholder="Name Class" wire:model.lazy='name' />
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" id="closeModalId" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                  </button>
                <button type="submit" class="btn btn-primary"  >
                    <i class='bx bx-save' ></i>
                    Save
                </button>
                </div>
              </div>
            </form>
            </div>
          </div>
    </div>
</div>


@script
    <script>
    const closeModal = document.getElementById("closeModalId");
        $wire.on('updateSuccess', (data) => {
            $wire.dispatch('swal:modal', [{
                'title': 'Berhasil',
                'type': 'success',
                'text': ''
        }]);
        $wire.dispatch('renderComponent');
        closeModal.click()
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
                $wire.call('deleteClassCategory', data);
                closeModal.click()
                $wire.dispatch('updateSuccess');
            }
        });

    });
    </script>
@endscript
