@extends('layouts.user.app')


@section('content')
    @livewire('user-sub-pictures-page', ['sub_album_id' => $sub_album_id])
@endsection
