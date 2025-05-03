<script setup lang="ts">
import { Icon } from '@iconify/vue';
import { ref } from 'vue';
import Input from '../InputWithLabel.vue';

const notes = ref([{ label: '', text: '' }]);
const noteErrors = ref<string | null>(null);

const addNote = () => {
    notes.value.push({ label: '', text: '' });
};

const removeNote = (index: number) => {
    notes.value.splice(index, 1);
};
const validateNotes = () => {
    const isValid = notes.value.length > 0 && notes.value.every(
        note => note.label.trim() !== '' && note.text.trim() !== ''
    );
    noteErrors.value = isValid ? null : 'All notes must have a label and text.';
    return isValid;
};
</script>

<template>

    <div class="notes-section">
        <div class="flex items-center justify-between">
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

        <div v-for="(note, index) in notes" :key="index" class="mb-2 flex flex-row gap-2 lg:items-start">
            <div class="w-full">
                <div>
                    <Input type="text" label="Label" v-model="note.label" id="notes" name="notes" color="grayBorder"
                        margin="md" placeholder="Write your label" />
                </div>
                <div class="mt-3">
                    <Input type="textarea" v-model="note.text" id="notes" label="Notes:" name="notes" color="grayBorder"
                        margin="md" placeholder="Write your Note..." />
                </div>
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

    <!-- notes -->

</template>
