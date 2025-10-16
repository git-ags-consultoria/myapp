@extends('layouts.admin')

@section('content')
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold">Federations</h2>
            <a href="{{ route('admin.federations.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full border border-gray-200 divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-2 text-left">#</th>
                <th class="px-4 py-2 text-left">Name</th>
                <th class="px-4 py-2 text-left">Acronym</th>
                <th class="px-4 py-2 text-left">Website</th>
                <th class="px-4 py-2 text-right">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
            @forelse($federations as $f)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $f->id }}</td>
                    <td class="px-4 py-2 font-medium">{{ $f->name }}</td>
                    <td class="px-4 py-2">{{ $f->acronym }}</td>
                    <td class="px-4 py-2">
                        @if($f->website)
                            <a href="{{ $f->website }}" class="text-blue-600 hover:underline" target="_blank">{{ $f->website }}</a>
                        @else
                            <span class="text-gray-400 italic">—</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 text-right space-x-2">
                        <a href="{{ route('admin.federations.show', $f) }}" class="text-gray-600 hover:underline">View</a>
                        <a href="{{ route('admin.federations.edit', $f) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.federations.destroy', $f) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this federation?')" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center text-gray-500 py-4">No federations found.</td></tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-4">{{ $federations->links() }}</div>
    </div>
@endsection
