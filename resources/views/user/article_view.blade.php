@extends('layouts.user.app')


@section('content')
    @livewire('user-article-view-page', ['id' => $id])
@endsection
