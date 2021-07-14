@extends('layouts.admin.app')

@section('content')

    @livewire('admin-sub-album-list-page', ['album_id' => $album_id])

@endsection
