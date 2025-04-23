<script setup>
import { Icon } from '@iconify/vue';
import { ref } from 'vue';
const showFilter = ref(false);
</script>
<template>
    <div class="mx-auto max-w-7xl w-full">
        <div>
            <Icon icon="rivet-icons:filter" width="20" height="20" class="mt-2" @click="showFilter = !showFilter" />
        </div>

        <div class="mt-7 mb-32 " v-if="showFilter">
            <div
                class="flex flex-col gap-4 fixed bg-white lg:w-full w-96 mx-4 absolute left-0 lg:left-[120px] lg:max-w-6xl rounded-md px-4 py-3 text-sm shadow-[0px_0px_8.6px_0px_#005FAF40] focus:outline-none focus:ring focus:border-gray-400 transition-all">
                <h1 class="font-[Lato] font-medium text-[18px] leading-[16px] tracking-[0] text-black">Filter</h1>
                <div class="flex gap-2">
                    <h1 class="font-[Lato] font-medium text-[18px] leading-[16px] tracking-[0] text-black">Order Status
                    </h1>
                    <Icon icon="icon-park-outline:down" width="20" height="20" />
                </div>
                <div class="flex gap-2">
                    <h1 class="font-[Lato] font-medium text-[18px] leading-[16px] tracking-[0] text-black">Delivery Date
                    </h1>
                    <Icon icon="icon-park-outline:down" width="20" height="20" />
                </div>
            </div>

        </div>
    </div>

</template>