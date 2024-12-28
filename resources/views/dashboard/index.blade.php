@extends('layouts.app')

@section('content')
    @if(Auth::user()->role === 'admin')
        <h1>Welcome, Admin</h1>
    @elseif(Auth::user()->role === 'karyawan')
        <h1>Welcome, Karyawan</h1>
    @else
        <h1>Access Denied</h1>
 @endif
@endsection