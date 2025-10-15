@extends('layouts.admin')

@section('content')
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6 gap-3">
            <h2 class="text-2xl font-bold text-gray-800">Federations</h2>
            <a href="{{ route('admin.federations.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                + Add Federation
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left font-semibold text-gray-600">#</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-600">Name</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-600">Abbreviation</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-600">Country</th>
                    <th class="px-4 py-2 text-right font-semibold text-gray-600">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @forelse ($federations as $federation)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-2">{{ $federation->id }}</td>
                        <td class="px-4 py-2 font-medium text-gray-800">{{ $federation->name }}</td>
                        <td class="px-4 py-2">{{ $federation->abbreviation }}</td>
                        <td class="px-4 py-2">{{ $federation->country }}</td>
                        <td class="px-4 py-2 text-right space-x-2">
                            <a href="{{ route('admin.federations.edit', $federation) }}"
                               class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.federations.destroy', $federation) }}"
                                  method="POST"
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline"
                                        onclick="return confirm('Are you sure you want to delete this federation?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-center text-gray-500">No federations found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
