<form
    method="POST"
    action="{{ isset($format) ? route('admin.graduation-formats.update', $format) : route('admin.graduation-formats.store') }}"
    class="space-y-6"
>
    @csrf
    @if(isset($format))
        @method('PUT')
    @endif

    <div>
        <label class="block text-sm font-medium text-gray-700">Modality</label>
        <select name="modality_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            <option value="">Select modality</option>
            @foreach($modalities as $modality)
                <option value="{{ $modality->id }}"
                    {{ old('modality_id', $format->modality_id ?? '') == $modality->id ? 'selected' : '' }}>
                    {{ $modality->name }}
                </option>
            @endforeach
        </select>
        @error('modality_id')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Belt Name</label>
        <input
            type="text"
            name="belt_name"
            value="{{ old('belt_name', $format->belt_name ?? '') }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            required
        >
        @error('belt_name')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Belt Color</label>
        <input
            type="text"
            name="belt_color"
            value="{{ old('belt_color', $format->belt_color ?? '') }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            required
        >
        @error('belt_color')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Min. Age</label>
            <input
                type="number"
                name="min_age"
                value="{{ old('min_age', $format->min_age ?? 0) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            >
            @error('min_age')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Min. Months</label>
            <input
                type="number"
                name="min_months"
                value="{{ old('min_months', $format->min_months ?? 0) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            >
            @error('min_months')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Order</label>
        <input
            type="number"
            name="order"
            value="{{ old('order', $format->order ?? 0) }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        >
        @error('order')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="pt-4">
        <button
            type="submit"
            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition"
        >
            {{ isset($format) ? 'Update' : 'Create' }}
        </button>
    </div>
</form>
