@extends('layouts.user.app')


@section('content')
    @livewire('user-sub-sub-albums-page', ['sub_album_id' => $sub_album_id])
@endsection
