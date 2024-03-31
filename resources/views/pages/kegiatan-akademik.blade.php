@extends('layouts.app-front-end')

@section('content')

<x-article-list :title="'Kegiatan Akademik'" :posts="$articles"></x-article-list>

@endsection