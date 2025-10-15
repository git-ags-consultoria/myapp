<template>
    <div class="bg-white shadow rounded-lg p-6">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Name</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Country</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Founded</th>
                    <th class="px-4 py-3"></th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                <tr v-for="fed in federations" :key="fed.id" class="hover:bg-gray-50">
                    <td class="px-4 py-3 font-medium">{{ fed.name }}</td>
                    <td class="px-4 py-3">{{ fed.country || '-' }}</td>
                    <td class="px-4 py-3">{{ fed.founded_year || '-' }}</td>
                    <td class="px-4 py-3 text-right">
                        <button @click="deleteFederation(fed.id)"
                                class="text-red-600 hover:text-red-800">Delete</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <!-- Empty State -->
        <div v-if="federations.length === 0" class="text-center text-gray-500 py-6">
            No federations found.
        </div>

        <!-- Modal -->
        <div v-if="showCreateModal" class="fixed inset-0 flex items-center justify-center bg-black/40 z-50">
            <div class="bg-white rounded-lg shadow-lg w-96 p-6">
                <h2 class="text-lg font-semibold mb-4">Add Federation</h2>
                <form @submit.prevent="addFederation" class="space-y-3">
                    <input v-model="form.name" placeholder="Name" required
                           class="border rounded w-full px-3 py-2" />
                    <input v-model="form.country" placeholder="Country"
                           class="border rounded w-full px-3 py-2" />
                    <input v-model="form.founded_year" type="number" placeholder="Founded Year"
                           class="border rounded w-full px-3 py-2" />

                    <div class="flex justify-end space-x-3 mt-4">
                        <button type="button" @click="showCreateModal=false"
                                class="px-4 py-2 text-gray-600">Cancel</button>
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const federations = ref([])
const showCreateModal = ref(false)
const form = ref({ name: '', country: '', founded_year: '' })

const fetchFederations = async () => {
    const { data } = await axios.get('/api/admin/federations')
    federations.value = data
}

const addFederation = async () => {
    await axios.post('/api/admin/federations', form.value)
    form.value = { name: '', country: '', founded_year: '' }
    showCreateModal.value = false
    fetchFederations()
}

const deleteFederation = async (id) => {
    if (confirm('Delete this federation?')) {
        await axios.delete(`/api/admin/federations/${id}`)
        fetchFederations()
    }
}

onMounted(fetchFederations)
</script>
