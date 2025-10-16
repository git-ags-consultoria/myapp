<div 
    x-data="federationForm({ 
        name: '{{ old('name', $federation->name ?? '') }}', 
        acronym: '{{ old('acronym', $federation->acronym ?? '') }}', 
        website: '{{ old('website', $federation->website ?? '') }}' 
    })"
    x-init="validateAll()"
    class="space-y-4"
>
    <!-- Name -->
    <div>
        <label class="block text-sm font-medium mb-1">Name <span class="text-red-500">*</span></label>
        <input type="text" name="name" x-model="fields.name" @input="validateField('name')" 
               class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200"
               placeholder="e.g. International BJJ Federation">
        <template x-if="errors.name">
            <p class="text-red-500 text-sm mt-1" x-text="errors.name"></p>
        </template>
    </div>

    <!-- Acronym -->
    <div>
        <label class="block text-sm font-medium mb-1">Acronym <span class="text-red-500">*</span></label>
        <input type="text" name="acronym" x-model="fields.acronym" @input="validateField('acronym')" 
               class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200"
               placeholder="e.g. IBJJF">
        <template x-if="errors.acronym">
            <p class="text-red-500 text-sm mt-1" x-text="errors.acronym"></p>
        </template>
    </div>

    <!-- Website -->
    <div>
        <label class="block text-sm font-medium mb-1">Website</label>
        <input type="url" name="website" x-model="fields.website" @input="validateField('website')" 
               class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200"
               placeholder="https://example.com">
        <template x-if="errors.website">
            <p class="text-red-500 text-sm mt-1" x-text="errors.website"></p>
        </template>
    </div>

    <!-- Actions -->
    <div class="mt-6 flex justify-end space-x-3">
        <a href="{{ route('admin.federations.index') }}" 
           class="px-4 py-2 border rounded hover:bg-gray-100">Cancel</a>
        <button type="submit"
                :disabled="!isValid"
                :class="isValid ? 'bg-blue-600 hover:bg-blue-700 text-white' : 'bg-gray-300 text-gray-600 cursor-not-allowed'"
                class="px-4 py-2 rounded transition">
            {{ $buttonText }}
        </button>
    </div>
</div>

<script>
function federationForm(initial) {
    return {
        fields: { ...initial },
        errors: {},
        isValid: false,

        validateField(field) {
            this.errors[field] = '';
            const value = this.fields[field]?.trim();

            switch (field) {
                case 'name':
                    if (!value) this.errors.name = 'Name is required.';
                    else if (value.length < 3) this.errors.name = 'Must be at least 3 characters.';
                    break;
                case 'acronym':
                    if (!value) this.errors.acronym = 'Acronym is required.';
                    else if (value.length > 10) this.errors.acronym = 'Max 10 characters.';
                    break;
                case 'website':
                    if (value && !/^https?:\/\/[^\s]+$/.test(value))
                        this.errors.website = 'Enter a valid URL.';
                    break;
            }

            this.validateAll();
        },

        validateAll() {
            // Validate all fields initially
            Object.keys(this.fields).forEach(f => this.validateField(f));
            // Check if there are any active errors
            this.isValid = Object.values(this.errors).every(e => e === '');
        },
    };
}
</script>