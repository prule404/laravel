@extends('admins::layouts.master')

@section('content')
    <livewire:admins::user-datatables searchable="name, email" exportable/>
@endsection