@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-6 text-gray-800">View Graduation Format</h1>

    <div class="bg-white shadow rounded-lg p-6">
        <p><strong>Modality:</strong> {{ $graduationFormat->modality->name }}</p>
        <p><strong>Belt:</strong> {{ $graduationFormat->belt_name }}</p>
        <p><strong>Color:</strong>
            <span class="inline-block w-5 h-5 rounded-full"
                  style="background-color: {{ $graduationFormat->belt_color }}"></span>
            {{ $graduationFormat->belt_color }}
        </p>
        <p><strong>Min Age:</strong> {{ $graduationFormat->min_age }}</p>
        <p><strong>Min Months:</strong> {{ $graduationFormat->min_months }}</p>
        <p><strong>Order:</strong> {{ $graduationFormat->order }}</p>
    </div>

    <a href="{{ route('admin.graduation-formats.index') }}" class="mt-4 inline-block text-blue-600 hover:underline">← Back</a>
@endsection
