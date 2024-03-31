@extends('layouts.app-front-end')

@section('content')

<x-article-list :title="'Prestasi'" :posts="$articles"></x-article-list>

@endsection