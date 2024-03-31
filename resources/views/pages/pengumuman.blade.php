@extends('layouts.app-front-end')

@section('content')

<x-article-list :title="'Pengumuman'" :posts="$articles"></x-article-list>

@endsection