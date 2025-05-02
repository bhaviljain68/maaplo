<script setup>
import Input from './InputWithLabel.vue';
import { Icon } from '@iconify/vue';

</script>
<template>
    <div class="flex flex-col lg:flex-row justify-between">
        <div class="lg:gap-2 gap-2 mt-3 flex flex-col">
            <div>
                <label>Trail Date : </label>
            </div>
            <div class="flex">
                <Input type="date" id="trail-date" width="full" name="trail-date" color="grayBorder"
                    margin="md" />
                <Icon icon="mingcute:delete-fill" width="24" height="24" class="mt-4 ml-2" />
            </div>
        </div>

        <!-- Delivery Date -->
        <div class="lg:gap-2 gap-2 mt-3 flex flex-col">
            <div>
                <label>Delivery Date : </label>
            </div>
            <div>
                <Input type="date" id="delivery-date" width="full" name="delivery-date" color="grayBorder"
                    margin="md" />
            </div>
        </div>
    </div>
</template>