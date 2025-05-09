<script setup>
import { ref, watch } from 'vue';
import Input from '../InputWithLabel.vue';

const color = ref('');
const emits = defineEmits(['setColor']);

watch(() => color.value, (newColorValue) => {
    emits('setColor', newColorValue)
})

</script>
<template>
    <div class="flex flex-col">
        <Input v-model="color" id="favcolor" name="favcolor" label="Color:" type="text" color="grayBorder" margin="md"
            placeholder="Enter color" />
    </div>
</template>