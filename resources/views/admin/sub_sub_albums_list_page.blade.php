@extends('layouts.admin.app')

@section('content')

    @livewire('admin-sub-sub-album-list-page', ['sub_album_id' => $sub_album_id])

@endsection
