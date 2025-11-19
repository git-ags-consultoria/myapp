@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-6 text-gray-800">View Modality</h1>

    <div class="bg-white shadow rounded-lg p-6">
        <p><strong>Name:</strong> {{ $modality->name }}</p>
        <p><strong>Acronym:</strong> {{ $modality->acronym ?? '—' }}</p>
        <p><strong>Description:</strong> {{ $modality->description ?? '—' }}</p>
    </div>

    <a href="{{ route('admin.modalities.index') }}" class="mt-4 inline-block text-blue-600 hover:underline">← Back</a>
@endsection
