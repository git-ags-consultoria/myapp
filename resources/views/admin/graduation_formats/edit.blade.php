@extends('layouts.admin')

@section('content')
    <div class="bg-white p-6 rounded-xl shadow max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Edit Graduation Format</h1>

        {{-- Form simples sem Alpine que usa o partial --}}
        <form action="{{ route('admin.graduation-formats.update', $format) }}" method="POST" novalidate>
            @csrf
            @method('PUT')
            @include('admin.graduation_formats.partials.form', ['format' => $format])
        </form>
    </div>
@endsection
