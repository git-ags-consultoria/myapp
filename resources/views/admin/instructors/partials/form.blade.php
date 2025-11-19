<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium text-gray-700">First Name</label>
        <input type="text" name="first_name" value="{{ old('first_name', $instructor->first_name ?? '') }}" required
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @error('first_name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Last Name</label>
        <input type="text" name="last_name" value="{{ old('last_name', $instructor->last_name ?? '') }}" required
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @error('last_name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" value="{{ old('email', $instructor->email ?? '') }}"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @error('email') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Phone</label>
        <input type="text" name="phone" value="{{ old('phone', $instructor->phone ?? '') }}"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @error('phone') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mt-4">
    <label class="block text-sm font-medium text-gray-700">Bio</label>
    <textarea name="bio" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('bio', $instructor->bio ?? '') }}</textarea>
    @error('bio') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
</div>
