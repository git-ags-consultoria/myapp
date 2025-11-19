@extends('layouts.admin')

@section('content')
    <div class="bg-white p-6 rounded-xl shadow">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Graduation Formats</h1>
            <a href="{{ route('admin.graduation-formats.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                + Add New Format
            </a>
        </div>

        @if ($formats->isEmpty())
            <p class="text-gray-500">No graduation formats found.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-200 text-left text-sm">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 border-b">Modality</th>
                        <th class="px-4 py-2 border-b">Belt</th>
                        <th class="px-4 py-2 border-b">Color</th>
                        <th class="px-4 py-2 border-b text-center">Min. Age</th>
                        <th class="px-4 py-2 border-b text-center">Min. Months</th>
                        <th class="px-4 py-2 border-b text-center">Order</th>
                        <th class="px-4 py-2 border-b text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($formats as $format)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border-b">{{ $format->modality->name }}</td>
                            <td class="px-4 py-2 border-b">{{ $format->belt_name }}</td>
                            <td class="px-4 py-2 border-b">
                                <span class="inline-block w-5 h-5 rounded-full border" style="background-color: {{ $format->belt_color }}"></span>
                                <span class="ml-2">{{ $format->belt_color }}</span>
                            </td>
                            <td class="px-4 py-2 border-b text-center">{{ $format->min_age }}</td>
                            <td class="px-4 py-2 border-b text-center">{{ $format->min_months }}</td>
                            <td class="px-4 py-2 border-b text-center">{{ $format->order }}</td>
                            <td class="px-4 py-2 border-b text-center space-x-2">
                                <a href="{{ route('admin.graduation-formats.edit', $format) }}"
                                   class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('admin.graduation-formats.destroy', $format) }}"
                                      method="POST" class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this format?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
