@extends('layouts.admin')

@section('content')
    <div class="bg-white p-6 rounded-xl shadow max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Add Graduation Format</h1>

        {{-- Form simples sem Alpine que usa o partial --}}
        <form action="{{ route('admin.graduation-formats.store') }}" method="POST" novalidate>
            @csrf
            @include('admin.graduation_formats.partials.form', ['format' => null])
        </form>
    </div>
@endsection
