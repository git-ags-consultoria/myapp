@extends('layouts.admin')

@section('content')
    <h1>Create Federation</h1>

    <form action="{{ route('admin.federations.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name">

        <label>Country:</label>
        <input type="text" name="country">

        <label>Founded Year:</label>
        <input type="number" name="founded_year">

        <button type="submit">Save</button>
    </form>
@endsection
