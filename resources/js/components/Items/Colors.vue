<script setup>
import Input from '../InputWithLabel.vue';

</script>
<template>
    <div class="mt-5 flex flex-col">
        <label class="font-normal text-md leading-4 tracking-normal font-lato mb-2">
            Color : </label>
        <Input type="text" id="favcolor" name="favcolor" color="grayBorder" margin="md"/>
    </div>
</template>