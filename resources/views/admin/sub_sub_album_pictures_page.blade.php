@extends('layouts.admin.app')

@section('content')

    @livewire('admin-sub-sub-album-pictures-page', ['sub_sub_album_id' => $sub_sub_album_id])

@endsection
