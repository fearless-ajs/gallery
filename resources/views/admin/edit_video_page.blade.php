@extends('layouts.admin.app')

@section('content')

    @livewire('edit-video-page', ['id' => $id])

@endsection
