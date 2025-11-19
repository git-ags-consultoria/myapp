@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">New Instructor</h1>

    <form action="{{ route('admin.instrutores.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        @include('admin.instructors.partials.form')
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create</button>
    </form>
@endsection
