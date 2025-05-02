<script setup>
import Input from '../InputWithLabel.vue';

</script>
<template>
    <div class="mt-5 flex flex-col">
        <Input v-model="favColor" id="favcolor" name="favcolor" label="Color:" type="text" color="grayBorder"
            margin="md" placeholder="Enter color" />
    </div>
</template> 