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

                        <div class="divider text-start">
                            <div class="divider-text">A. Identitas Siswa</div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col mb-0">
                                <label for="emailBasic" class="form-label">Nama</label>
                                <input type="name" class="form-control" placeholder="Masukkan nama registrasi..." wire:model.live='name' />
                                @error('name') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6 mb-0">
                                <label for="emailBasic" class="form-label">Jenis Kelamin</label>
                                <div class="d-flex gap-3 align-items-center">
                                    <div class="form-check">
                                        <input name="gender" wire:model.live='gender' class="form-check-input" type="radio" value="laki_laki" id="gender1">
                                        <label class="form-check-label" for="gender1"> Laki Laki </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="gender" wire:model.live='gender' class="form-check-input" type="radio" value="perempuan" id="gender2">
                                        <label class="form-check-label" for="gender2"> Perempuan </label>
                                    </div>
                                </div>
                                @error('gender') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                            </div>
                            <div class="col-6 mb-0">
                                <label for="religion" class="form-label">Agama</label>
                                <select class="form-select" name="religion_id" wire:model.live='religion_id'>
                                    <option value="" disabled selected>-- PILIH AGAMA --</option>
                                    @foreach($religions as $religion)
                                    <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                    @endforeach
                                </select>
                                @error('religion_id') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                            </div>

                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6 mb-0">
                                <label for="emailBasic" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" placeholder="Cth: Denpasar" wire:model.live='place_of_birth' />
                                @error('place_of_birth') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                            </div>
                            <div class="col-6 mb-0">
                                <label for="emailBasic" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" placeholder="Pilih tanggal" wire:model.live='date_of_birth' />
                                @error('date_of_birth') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col mb-0">
                                <label for="emailBasic" class="form-label">Telepon</label>
                                <input type="text" class="form-control" placeholder="Masukkan nomor telepon" wire:model.live='phone' />
                                @error('phone') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col mb-0">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea type="text" class="form-control" placeholder="Cth: Jalan Gatot Subroto" wire:model.live='address'></textarea>
                                @error('address') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-4 mb-0">
                                <label for="address" class="form-label">Jumlah Saudara</label>
                                <input type="number" class="form-control" placeholder="Cth: 2" wire:model.live='number_of_siblings' />
                                @error('number_of_siblings') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                            </div>
                            <div class="col-4 mb-0">
                                <label for="height" class="form-label">Tinggi Badan</label>
                                <input type="number" class="form-control" placeholder="Cth: 2" wire:model.live='height' />
                                @error('height') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                            </div>
                            <div class="col-4 mb-0">
                                <label for="weight" class="form-label">Berat Badan</label>
                                <input type="number" class="form-control" placeholder="Cth: 2" wire:model.live='weight' />
                                @error('weight') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                            </div>
                        </div>

                        <div class="divider text-start">
                            <div class="divider-text">B. Identitas Orang Tua</div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col mb-0">
                                <label for="name" class="form-label">Nama Ayah</label>
                                <input type="text" class="form-control" placeholder="Masukkan nama ayah" wire:model.live='parents.0.name' />
                                <input type="hidden" class="form-control" wire:model.live='parents.0.type' value="ayah" />
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6 mb-0">
                                <label for="place_of_birth" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" placeholder="Cth: Denpasar" wire:model.live='parents.0.place_of_birth' />
                            </div>
                            <div class="col-6 mb-0">
                                <label for="emailBasic" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" placeholder="Pilih tanggal" wire:model.live='parents.0.date_of_birth' />

                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col mb-0">
                                <label for="address" class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" placeholder="Masukkan pekerjaan" wire:model.live='parents.0.job' />
                            </div>
                            <div class="col-6 mb-0">
                                <label for="education" class="form-label">Pendidikan</label>
                                <select class="form-select" name="education_id" wire:model.live='parents.0.education_id'>
                                    <option value="" disabled selected>-- PILIH PENDIDIKAN --</option>
                                    @foreach($educations as $education)
                                    <option value="{{ $education->id }}">{{ $education->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col mb-0">
                                <label for="address" class="form-label">Alamat Lengkap</label>
                                <textarea type="text" class="form-control" placeholder="Cth: Jalan Gatot Subroto" wire:model.live='parents.0.address'></textarea>
                            </div>
                        </div>
                        <div class="w-100 border"></div>
                        <div class="row g-2 mb-3 mt-2">
                            <div class="col mb-0">
                                <label for="name" class="form-label">Nama Ibu</label>
                                <input type="text" class="form-control" placeholder="Masukkan nama ibu" wire:model.live='parents.1.name' />
                                <input type="hidden" class="form-control" wire:model.live='parents.1.type' value="ibu" />
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6 mb-0">
                                <label for="place_of_birth" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" placeholder="Cth: Denpasar" wire:model.live='parents.1.place_of_birth' />
                            </div>
                            <div class="col-6 mb-0">
                                <label for="emailBasic" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" placeholder="Pilih tanggal" wire:model.live='parents.1.date_of_birth' />
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col mb-0">
                                <label for="address" class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" placeholder="Masukkan pekerjaan" wire:model.live='parents.1.job' />
                            </div>
                            <div class="col-6 mb-0">
                                <label for="education" class="form-label">Pendidikan</label>
                                <select class="form-select" name="education_id" wire:model.live='parents.1.education_id'>
                                    <option value="" disabled selected>-- PILIH PENDIDIKAN --</option>
                                    @foreach($educations as $education)
                                    <option value="{{ $education->id }}">{{ $education->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col mb-0">
                                <label for="address" class="form-label">Alamat Lengkap</label>
                                <textarea type="text" class="form-control" placeholder="Cth: Jalan Gatot Subroto" wire:model.live='parents.1.address'></textarea>
                            </div>
                        </div>


                        <div class="divider text-start">
                            <div class="divider-text">C. Identitas Wali</div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col mb-0">
                                <label for="name" class="form-label">Nama Wali</label>
                                <input type="text" class="form-control" placeholder="Masukkan nama wali" wire:model.live='parents.2.name' />
                                <input type="hidden" class="form-control" wire:model.live='parents.2.type' value="wali" />
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6 mb-0">
                                <label for="place_of_birth" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" placeholder="Cth: Denpasar" wire:model.live='parents.2.place_of_birth' />
                            </div>
                            <div class="col-6 mb-0">
                                <label for="emailBasic" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" placeholder="Pilih tanggal" wire:model.live='parents.2.date_of_birth' />
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col mb-0">
                                <label for="address" class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" placeholder="Masukkan pekerjaan" wire:model.live='parents.2.job' />
                            </div>
                            <div class="col-6 mb-0">
                                <label for="education" class="form-label">Pendidikan</label>
                                <select class="form-select" name="education_id" wire:model.live='parents.2.education_id'>
                                    <option value="" disabled selected>-- PILIH PENDIDIKAN --</option>
                                    @foreach($educations as $education)
                                    <option value="{{ $education->id }}">{{ $education->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col mb-0">
                                <label for="address" class="form-label">Alamat Lengkap</label>
                                <textarea type="text" class="form-control" placeholder="Cth: Jalan Gatot Subroto" wire:model.live='parents.2.address'></textarea>
                            </div>
                        </div>


                        <div class="divider text-start">
                            <div class="divider-text">D. Persyaratan Pendaftaran</div>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col mb-0">
                                <label for="akta_image" class="form-label">Akta Kelahiran</label>
                                <div class="input-group">
                                    <input wire:model.live='akta_image' class="form-control" type="file" id="akta_image">
                                    @if(is_string($akta_image))
                                    <a href="{{ Storage::url($akta_image) }}" class="btn btn-success"><i class="bx bx-image-alt"></i> Lihat</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col mb-0">
                                <label for="kk_image" class="form-label">Kartu Keluarga</label>
                                <div class="input-group">
                                    <input wire:model.live='kk_image' class="form-control" type="file" id="kk_image">
                                    @if(is_string($kk_image))
                                    <a href="{{ Storage::url($kk_image) }}" class="btn btn-success"><i class="bx bx-image-alt"></i> Lihat</a>
                                    @endif
                                </div>
                            </div>
                        </div>

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