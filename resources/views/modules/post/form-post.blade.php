@extends('layouts.app-blank')

@section('content')


@livewire('module.kegiatan.canvas-kegiatan')

  <div class="buy-now">
    <a
      href="#"
      target="_blank"
      class="btn btn-danger btn-buy-not-now"
      > Cancel</a
    >
  </div>




@endsection


@push('script')
  <script>

  </script>
@endpush
