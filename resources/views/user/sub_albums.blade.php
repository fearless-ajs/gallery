@extends('layouts.user.app')


@section('content')
    @livewire('user-sub-albums-page', ['album_id' => $album_id])
@endsection
