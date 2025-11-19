<form x-data="{
        name: '{{ $modality->name ?? '' }}',
        acronym: '{{ $modality->acronym ?? '' }}',
        valid() { return this.name.trim().length > 0 }
    }"
      method="POST" action="{{ $route }}" class="bg-white shadow rounded-lg p-6 space-y-4">
    @csrf
    @if($method === 'PUT') @method('PUT') @endif

    <div>
        <label class="block font-semibold">Name</label>
        <input type="text" name="name" x-model="name"
               class="w-full border p-2 rounded" required />
        <p x-show="name.trim().length === 0" class="text-red-500 text-sm mt-1">Name is required.</p>
    </div>

    <div>
        <label class="block font-semibold">Acronym</label>
        <input type="text" name="acronym" x-model="acronym"
               class="w-full border p-2 rounded" />
    </div>

    <div>
        <label class="block font-semibold">Description</label>
        <textarea name="description" class="w-full border p-2 rounded">{{ $modality->description ?? '' }}</textarea>
    </div>

    <div class="flex justify-end">
        <button type="submit"
                :disabled="!valid()"
                :class="valid() ? 'bg-blue-600 hover:bg-blue-700 text-white' : 'bg-gray-400 text-gray-700 cursor-not-allowed'"
                class="px-4 py-2 rounded">
            Save
        </button>
    </div>
</form>
