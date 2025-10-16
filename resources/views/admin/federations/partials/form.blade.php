<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium">Name</label>
        <input type="text" name="name" value="{{ old('name', $federation->name ?? '') }}" class="w-full border rounded px-3 py-2">
        @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Acronym</label>
        <input type="text" name="acronym" value="{{ old('acronym', $federation->acronym ?? '') }}" class="w-full border rounded px-3 py-2">
        @error('acronym') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Website</label>
        <input type="url" name="website" value="{{ old('website', $federation->website ?? '') }}" class="w-full border rounded px-3 py-2">
        @error('website') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mt-6 flex justify-end space-x-3">
    <a href="{{ route('admin.federations.index') }}" class="px-4 py-2 border rounded hover:bg-gray-100">Cancel</a>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">{{ $buttonText }}</button>
</div>
