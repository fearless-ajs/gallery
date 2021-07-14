@extends('layouts.admin.app')

@section('content')

    @livewire('admin-album-pictures-page', ['album_id' => $album_id])

@endsection
