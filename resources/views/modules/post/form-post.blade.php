@extends('layouts.app-blank')

@section('content')


@livewire('module.kegiatan.canvas-kegiatan',['category'=>$category->slug ?? $post->categories->first()->slug,'idKegiatan'=>$post->slug ?? null])


@endsection


@push('script')
  <script>

  </script>
@endpush
