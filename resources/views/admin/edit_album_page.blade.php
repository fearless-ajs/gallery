@extends('layouts.admin.app')

@section('content')

    @livewire('edit-album-page', ['id' => $id])

@endsection
