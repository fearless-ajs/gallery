@extends('layouts.user.app')


@section('content')
    @livewire('user-sub-sub-pictures-page', ['sub_sub_album_id' => $sub_sub_album_id])
@endsection
