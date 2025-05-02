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
</script>

<template>

    <div class="notes-section">
        <div class="flex items-center justify-between mt-5">
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

        <div v-for="(note, index) in notes" :key="index" class="mb-2 flex flex-row gap-4 lg:items-start">
            <div>
                <Input v-model="note.text" type="text" id="notes" width="full"  label="Notes:" name="notes" color="grayBorder"
                    margin="md"/>
            </div>
            <!-- Show - button if more than one note -->
            <div class="flex items-center p-1" v-if="notes.length > 1">
                <button type="button" @click="removeNote(index) "
                    class="flex items-center text-red-500 hover:text-red-600 transition">
                    <Icon icon="mdi:minus-circle-outline" width="20" height="20" class="mr-1" />
                </button>
            </div>
        </div>
    </div>
</template>