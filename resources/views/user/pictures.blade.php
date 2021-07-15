@extends('layouts.user.app')


@section('content')
    @livewire('user-pictures-page', ['album_id' => $album_id])
@endsection
