<script setup>
import { defineProps, defineEmits } from 'vue';
import { Icon } from '@iconify/vue';
const props = defineProps({
    showable: {
        type: Object,
        default: () => ({ showSearch: false, showFilter: false })
    }
});
const emit = defineEmits(['hideOrShow']);

</script>

<template>
    <div class="mx-auto max-w-7xl w-full">
        <!-- Search Icon -->
        <div>
            <Icon icon="material-symbols:search" width="32" height="32" class="mt-1 cursor-pointer "
                @click="emit('hideOrShow', 'search')" />
        </div>
    </div>
</template>
