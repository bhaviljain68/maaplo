<script setup>
import { Icon } from '@iconify/vue';
const props = defineProps({
    bgColor: {
        default: '#FFFCE6'
    },
    borderColor: {
        type: String,
        default: '#837200'
    }
});
console.log('hello', props.borderColor); 
</script>
<template>

    <div class=" gap-[10px] rounded-[10px] px-[10px] py-[17px]" :style="{
        backgroundColor: props.bgColor,
        border: `1px solid ${props.borderColor}`,

    }">
        <div class="flex flex-row">
            <div>
                <h1
                    class="font-[Lato] font-medium text-[18px] leading-[16px] tracking-[0] text-center text-[#837200] p-2">
                    1</h1>
            </div>
            <div>
                <h1
                    class="font-[Lato] font-medium text-[18px] leading-[16px] tracking-[0] text-center text-[#837200] p-2">
                    Richa Shah
                </h1>
            </div>

        </div>
        <div class="flex flex-row justify-between">
            <div>
                <p
                    class="font-[Lato] font-medium text-[18px] leading-[16px] tracking-[0] text-center text-[#837200] p-2">
                    Items - 5</p>
            </div>
            <div>
                <p
                    class="font-[Lato] font-medium text-[18px] leading-[16px] tracking-[0] text-center text-[#837200] p-2">
                    Delivery - 14-04-2025</p>
            </div>
        </div>
        <div>
            <p class="font-[Lato] font-medium text-[18px] leading-[16px] tracking-[0]  text-[#837200] p-2">Status - In
                Progress</p>
        </div>
        <div class="flex justify-end gap-3">
            <Icon icon="ri:edit-fill" width="18" height="18" class="text-[#005FAF]" />
            <Icon icon="ic:baseline-delete" width="18" height="18" class="text-[#E73939]" />
        </div>

    </div>



</template>