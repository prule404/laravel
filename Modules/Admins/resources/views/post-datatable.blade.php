@extends('admins::layouts.master')

@section('content')
    <livewire:admins::post-datatables searchable="name, email" exportable/>
@endsection