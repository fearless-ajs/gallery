@extends('layouts.admin.app')

@section('content')

    @livewire('edit-article-page', ['id' => $id])

@endsection
