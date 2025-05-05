<script setup lang="ts">
defineProps<{
    show: boolean;
    imageUrl: string;
}>();
const emit = defineEmits(['close']);
const close = () => emit('close');
</script>

<template>
    <div v-if="show" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm px-4">
        <div class="relative max-w-4xl w-full">
            <!-- Close Button -->
            <button @click="close"
                class="absolute top-4 right-4 text-white text-2xl bg-gray-800 hover:bg-gray-700 rounded-full w-10 h-10 flex items-center justify-center shadow-md"
                aria-label="Close modal">
                &times;
            </button>

            <!-- Image Content -->
            <img :src="imageUrl" class="max-h-screen w-full object-contain rounded" alt="Preview" />
        </div>
    </div>
</template>
