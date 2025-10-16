@extends('layouts.admin')
@section('content')
    <div class="bg-white shadow rounded-lg p-6 max-w-lg mx-auto">
        <h2 class="text-2xl font-semibold mb-4">Federation Details</h2>

        <div class="space-y-3">
            <p><strong>Name:</strong> {{ $federation->name }}</p>
            <p><strong>Acronym:</strong> {{ $federation->acronym }}</p>
            <p><strong>Website:</strong>
                @if($federation->website)
                    <a href="{{ $federation->website }}" target="_blank" class="text-blue-600 hover:underline">{{ $federation->website }}</a>
                @else
                    <span class="text-gray-400 italic">—</span>
                @endif
            </p>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('admin.federations.edit', $federation) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</a>
            <a href="{{ route('admin.federations.index') }}" class="px-4 py-2 border rounded hover:bg-gray-100">Back</a>
        </div>
    </div>
@endsection
