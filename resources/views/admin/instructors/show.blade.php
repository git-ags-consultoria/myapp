@extends('layouts.admin')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">{{ $instructor->full_name }}</h1>

        <p><strong>Email:</strong> {{ $instructor->email ?? '-' }}</p>
        <p><strong>Phone:</strong> {{ $instructor->phone ?? '-' }}</p>
        <p><strong>Bio:</strong> {{ $instructor->bio ?? '—' }}</p>

        <div class="mt-6">
            <a href="{{ route('admin.instrutores.index') }}" class="text-gray-600 hover:underline">← Back to list</a>
        </div>
    </div>
@endsection
