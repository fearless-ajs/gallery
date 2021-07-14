@extends('layouts.admin.app')

@section('content')

    @livewire('admin-sub-album-pictures-page', ['sub_album_id' => $sub_album_id])

@endsection
