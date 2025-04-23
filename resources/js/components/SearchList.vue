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

        <!-- Search Input -->
        <div class="mt-4 mb-10 " v-if="showable.showSearch">
            <input type="text" placeholder="Search..."
                class="fixed lg:w-full w-96 mx-4 absolute left-0 lg:left-[120px] lg:max-w-6xl border border-gray-300 rounded-full px-4 py-3 text-sm shadow-[0px_0px_4.3px_0px_#16789333] focus:outline-none focus:ring focus:border-gray-400 transition-all" />

        </div>
    </div>
</template>
