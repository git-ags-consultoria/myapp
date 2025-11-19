@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Modalities</h1>
        <a href="{{ route('admin.modalities.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">+ New Modality</a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div x-data="{ search: '' }" class="bg-white shadow rounded-lg p-4">
        <input type="text" x-model="search" placeholder="Search by name or acronym..."
               class="w-full mb-4 p-2 border rounded" />

        <table class="min-w-full table-auto">
            <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">Name</th>
                <th class="px-4 py-2 text-left">Acronym</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($modalities as $modality)
                <tr x-show="search === '' || '{{ strtolower($modality->name) }}'.includes(search.toLowerCase()) || '{{ strtolower($modality->acronym ?? '') }}'.includes(search.toLowerCase())"
                    class="border-t">
                    <td class="px-4 py-2">{{ $modality->name }}</td>
                    <td class="px-4 py-2">{{ $modality->acronym }}</td>
                    <td class="px-4 py-2 text-center">
                        <a href="{{ route('admin.modalities.show', $modality) }}" class="text-blue-600 hover:underline">View</a> |
                        <a href="{{ route('admin.modalities.edit', $modality) }}" class="text-yellow-600 hover:underline">Edit</a> |
                        <form action="{{ route('admin.modalities.destroy', $modality) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
