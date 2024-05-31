<div class="divider text-start">
    <div class="divider-text">A. Identitas Siswa</div>
</div>
<div class="row g-2 mb-3">
    <div class="col mb-0">
        <label for="emailBasic" class="form-label"><span class="text-danger">*</span> Nama</label>
        <input type="name" class="form-control" placeholder="Masukkan nama siswa..." wire:model.live='name' />
        @error('name') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
    </div>
</div>
<div class="row g-2 mb-3">
    <div class="col-6 mb-0">
        <label for="emailBasic" class="form-label"><span class="text-danger">*</span> Jenis Kelamin</label>
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
        <label for="religion" class="form-label"><span class="text-danger">*</span> Agama</label>
        <select class="form-select" name="religion_id" wire:model.live='religion_id'>
            <option value="" disabled @if(is_null($religion_id)) selected @endif>-- PILIH AGAMA --</option>
            @foreach($religions as $religion)
            <option value="{{ $religion->id }}" @if($religion->id == $religion_id) selected @endif>{{ $religion->name }}</option>
            @endforeach
        </select>
        @error('religion_id') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
    </div>

</div>
<div class="row g-2 mb-3">
    <div class="col-6 mb-0">
        <label for="emailBasic" class="form-label"><span class="text-danger">*</span> Tempat Lahir</label>
        <input type="text" class="form-control" placeholder="Cth: Denpasar" wire:model.live='place_of_birth' />
        @error('place_of_birth') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
    </div>
    <div class="col-6 mb-0">
        <label for="emailBasic" class="form-label"><span class="text-danger">*</span> Tanggal Lahir</label>
        <input type="date" class="form-control" placeholder="Pilih tanggal" wire:model.live='date_of_birth' />
        @error('date_of_birth') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
    </div>
</div>
<div class="row g-2 mb-3">
    <div class="col mb-0">
        <label for="emailBasic" class="form-label"><span class="text-danger">*</span> Telepon</label>
        <input type="text" class="form-control" placeholder="Masukkan nomor telepon" wire:model.live='phone' />
        @error('phone') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
    </div>
</div>
<div class="row g-2 mb-3">
    <div class="col mb-0">
        <label for="address" class="form-label"><span class="text-danger">*</span> Alamat</label>
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
        <div class="input-group">
            <input type="number" class="form-control" placeholder="Cth: 2" wire:model.live='height' />
            <span class="input-group-text" id="basic-addon13">cm</span>
        </div>
        @error('height') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
    </div>
    <div class="col-4 mb-0">
        <label for="weight" class="form-label">Berat Badan</label>
        <div class="input-group">
            <input type="number" class="form-control" placeholder="Cth: 2" wire:model.live='weight' />
            <span class="input-group-text" id="basic-addon13">kg</span>
        </div>
        @error('weight') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
    </div>
</div>

<div class="divider text-start mt-5">
    <div class="divider-text">B. Identitas Orang Tua</div>
</div>
<div class="row g-2 mb-3">
    <div class="col mb-0">
        <label for="name" class="form-label">Nama Ayah</label>
        <input type="text" class="form-control" placeholder="Masukkan nama ayah" wire:model.live='parents.0.name' />
        <input type="hidden" class="form-control" wire:model.live='parents.0.type' value="ayah" />
        @error('parents.0.name') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
    </div>
</div>
<div class="row g-2 mb-3">
    <div class="col-6 mb-0">
        <label for="place_of_birth" class="form-label">Tempat Lahir</label>
        <input type="text" class="form-control" placeholder="Cth: Denpasar" wire:model.live='parents.0.place_of_birth' />
        @error('parents.0.place_of_birth') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
    </div>
    <div class="col-6 mb-0">
        <label for="emailBasic" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" placeholder="Pilih tanggal" wire:model.live='parents.0.date_of_birth' />
        @error('parents.0.date_of_birth') <span class="text-danger"><small>{{ $message }}</small></span> @enderror

    </div>
</div>
<div class="row g-2 mb-3">
    <div class="col mb-0">
        <label for="address" class="form-label">Pekerjaan</label>
        <input type="text" class="form-control" placeholder="Masukkan pekerjaan" wire:model.live='parents.0.job' />
        @error('parents.0.job') <span class="text-danger"><small>{{ $message }}</small></span> @enderror

    </div>
    <div class="col-6 mb-0">
        <label for="education" class="form-label">Pendidikan</label>
        <select class="form-select" name="education_id" wire:model.live='parents.0.education_id'>
            <option value="" disabled selected>-- PILIH PENDIDIKAN --</option>
            @foreach($educations as $education)
            <option value="{{ $education->id }}">{{ $education->name }}</option>
            @endforeach
        </select>
        @error('parents.0.education_id') <span class="text-danger"><small>{{ $message }}</small></span> @enderror

    </div>
</div>
<div class="row g-2 mb-3">
    <div class="col mb-0">
        <label for="address" class="form-label">Alamat Lengkap</label>
        <textarea type="text" class="form-control" placeholder="Cth: Jalan Gatot Subroto" wire:model.live='parents.0.address'></textarea>
        @error('parents.0.address') <span class="text-danger"><small>{{ $message }}</small></span> @enderror

    </div>
</div>
<div class="w-100 border"></div>
<div class="row g-2 mb-3 mt-2">
    <div class="col mb-0">
        <label for="name" class="form-label">Nama Ibu</label>
        <input type="text" class="form-control" placeholder="Masukkan nama ibu" wire:model.live='parents.1.name' />
        <input type="hidden" class="form-control" wire:model.live='parents.1.type' value="ibu" />
        @error('parents.1.name') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
    </div>
</div>
<div class="row g-2 mb-3">
    <div class="col-6 mb-0">
        <label for="place_of_birth" class="form-label">Tempat Lahir</label>
        <input type="text" class="form-control" placeholder="Cth: Denpasar" wire:model.live='parents.1.place_of_birth' />
        @error('parents.1.place_of_birth') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
    </div>
    <div class="col-6 mb-0">
        <label for="emailBasic" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" placeholder="Pilih tanggal" wire:model.live='parents.1.date_of_birth' />
        @error('parents.1.date_of_birth') <span class="text-danger"><small>{{ $message }}</small></span> @enderror

    </div>
</div>
<div class="row g-2 mb-3">
    <div class="col mb-0">
        <label for="address" class="form-label">Pekerjaan</label>
        <input type="text" class="form-control" placeholder="Masukkan pekerjaan" wire:model.live='parents.1.job' />
        @error('parents.1.job') <span class="text-danger"><small>{{ $message }}</small></span> @enderror

    </div>
    <div class="col-6 mb-0">
        <label for="education" class="form-label">Pendidikan</label>
        <select class="form-select" name="education_id" wire:model.live='parents.1.education_id'>
            <option value="" disabled selected>-- PILIH PENDIDIKAN --</option>
            @foreach($educations as $education)
            <option value="{{ $education->id }}">{{ $education->name }}</option>
            @endforeach
        </select>
        @error('parents.1.education_id') <span class="text-danger"><small>{{ $message }}</small></span> @enderror

    </div>
</div>
<div class="row g-2 mb-3">
    <div class="col mb-0">
        <label for="address" class="form-label">Alamat Lengkap</label>
        <textarea type="text" class="form-control" placeholder="Cth: Jalan Gatot Subroto" wire:model.live='parents.1.address'></textarea>
        @error('parents.1.address') <span class="text-danger"><small>{{ $message }}</small></span> @enderror

    </div>
</div>


<div class="divider text-start mt-5">
    <div class="divider-text">C. Identitas Wali</div>
</div>
<div class="row g-2 mb-3">
    <div class="col mb-0">
        <label for="name" class="form-label">Nama Wali</label>
        <input type="text" class="form-control" placeholder="Masukkan nama wali" wire:model.live='parents.2.name' />
        <input type="hidden" class="form-control" wire:model.live='parents.2.type' value="wali" />
        @error('parents.2.name') <span class="text-danger"><small>{{ $message }}</small></span> @enderror

    </div>
</div>
<div class="row g-2 mb-3">
    <div class="col-6 mb-0">
        <label for="place_of_birth" class="form-label">Tempat Lahir</label>
        <input type="text" class="form-control" placeholder="Cth: Denpasar" wire:model.live='parents.2.place_of_birth' />
        @error('parents.2.place_of_birth') <span class="text-danger"><small>{{ $message }}</small></span> @enderror

    </div>
    <div class="col-6 mb-0">
        <label for="emailBasic" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" placeholder="Pilih tanggal" wire:model.live='parents.2.date_of_birth' />
        @error('parents.2.date_of_birth') <span class="text-danger"><small>{{ $message }}</small></span> @enderror

    </div>
</div>
<div class="row g-2 mb-3">
    <div class="col mb-0">
        <label for="address" class="form-label">Pekerjaan</label>
        <input type="text" class="form-control" placeholder="Masukkan pekerjaan" wire:model.live='parents.2.job' />
        @error('parents.2.job') <span class="text-danger"><small>{{ $message }}</small></span> @enderror

    </div>
    <div class="col-6 mb-0">
        <label for="education" class="form-label">Pendidikan</label>
        <select class="form-select" name="education_id" wire:model.live='parents.2.education_id'>
            <option value="" disabled selected>-- PILIH PENDIDIKAN --</option>
            @foreach($educations as $education)
            <option value="{{ $education->id }}">{{ $education->name }}</option>
            @endforeach
        </select>
        @error('parents.2.education_id') <span class="text-danger"><small>{{ $message }}</small></span> @enderror

    </div>
</div>
<div class="row g-2 mb-3">
    <div class="col mb-0">
        <label for="address" class="form-label">Alamat Lengkap</label>
        <textarea type="text" class="form-control" placeholder="Cth: Jalan Gatot Subroto" wire:model.live='parents.2.address'></textarea>
    </div>
</div>


<div class="divider text-start mt-5">
    <div class="divider-text">D. Persyaratan Pendaftaran</div>
</div>

<div class="row g-2 mb-3">
    <div class="col mb-0">
        <label for="akta_image" class="form-label">Akta Kelahiran</label>
        <div class="input-group">
            <input wire:model.live='akta_image' class="form-control" type="file" id="akta_image">
            @if(is_string($akta_image))
            <a href="{{ asset('assets/images/'.$akta_image) }}" class="btn btn-success"><i class="bx bx-image-alt"></i> Lihat</a>
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
            <a href="{{ asset('assets/images/'. $kk_image) }}" class="btn btn-success"><i class="bx bx-image-alt"></i> Lihat</a>
            @endif
        </div>
    </div>
</div>


@if($showChangeStatus)
<div class="divider text-start mt-5">
    <div class="divider-text">E. Status Pendaftaran</div>
</div>

<div class="row g-2 mb-3">
    <div class="col mb-0">
        <div class="form-check">
            <input name="status" wire:model.live='status' class="form-check-input" type="checkbox" id="statusPendaftaran" @if(boolval($status)) checked @endif>
            <label class="form-check-label" for="statusPendaftaran">
                Siswa telah resmi bergabung
            </label>
        </div>
    </div>
</div>
@endif