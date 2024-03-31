@extends('layouts.app-front-end')

@section('content')

<x-article-list :title="'Fasilitas'" :posts="$articles"></x-article-list>

@endsection