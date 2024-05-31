<nav class="navbar navbar-expand-lg bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('assets/images/' . $company->logo) }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-grow-0" id="navbarNav">
            <ul class="navbar-nav gap-3">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile') }}">Profile Sekolah</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Akademik
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('kegiatan-akademik') }}">Kegiatan</a></li>
                        <li><a class="dropdown-item" href="{{ route('prestasi') }}">Presatasi</a></li>
                        <li><a class="dropdown-item" href="{{ route('fasilitas') }}">Fasilitas</a></li>
                        <li><a class="dropdown-item" href="{{ route('gallery-Image') }}">Gallery</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pengumuman') }}">Pengumuman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pendaftaran') }}">Pendaftaran</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
