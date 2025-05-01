<script setup lang="ts">
import { Icon } from '@iconify/vue';
import { ref } from 'vue';

const notes = ref([{ label: '', text: '' }]);
const noteErrors = ref<string | null>(null);

const addNote = () => {
    notes.value.push({ label: '', text: '' });
};

const removeNote = (index: number) => {
    notes.value.splice(index, 1);
};
</script>

<template>

    <div class="notes-section">
        <div class="flex items-center justify-between mt-5">
            <label class="block font-normal text-md leading-4 tracking-normal font-lato mb-2">Notes <span class="text-red-500">*</span></label>

            <div class="flex items-center space-x-3">
                <!-- Notes Count -->
                <span class="text-sm text-gray-600">Total: {{ notes.length }}</span>

                <!-- + Button on label line -->
                <button type="button" @click="addNote"
                    class="flex items-center text-green-500 hover:text-green-600 transition">
                    <Icon icon="mdi:plus-circle-outline" width="20" height="20" class="mr-1" />
                </button>
            </div>
        </div>

        <div v-for="(note, index) in notes" :key="index" class="mb-4 mt-2 flex gap-4 items-start">
            <div>
                <input v-model="note.text" type="text" id="favcolor" name="favcolor"
                    class="ml-5 p-1 border border-gray-300 rounded cursor-pointer w-[300px]">
            </div>

            <!-- Show - button if more than one note -->
            <div class="flex items-center p-1" v-if="notes.length > 1">
                <button type="button" @click="removeNote(index)"
                    class="flex items-center text-red-500 hover:text-red-600 transition">
                    <Icon icon="mdi:minus-circle-outline" width="20" height="20" class="mr-1" />
                </button>
            </div>
        </div>
    </div>
</template>