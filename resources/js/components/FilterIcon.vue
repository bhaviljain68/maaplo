<script setup>
import { Icon } from '@iconify/vue';
import { ref } from 'vue';
const showFilter = ref(false);

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
        <div>
            <Icon icon="rivet-icons:filter" width="20" height="20" class="mt-2" @click="emit('hideOrShow', 'filter')" />
        </div>

       
    </div>

</template>