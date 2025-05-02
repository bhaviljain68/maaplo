<script setup>
import { ref } from 'vue';
import { Icon } from '@iconify/vue';
import SvgIcon from '../SvgIcon.vue';
const showDropdownMeasurements = ref(false);
function toggleDropdownMeasurements() {
    showDropdownMeasurements.value = !showDropdownMeasurements.value;
}
</script>
<template>
    <div class="mt-5">
        <div @click="toggleDropdownMeasurements()" class="flex">
            <h1 class="font-normal text-md leading-4 tracking-normal font-lato">Measurements
            </h1>
            <Icon v-if="showDropdownMeasurements == false" icon="icon-park-outline:down" width="20" height="20"
                class="text-black ml-2" />
            <Icon v-if="showDropdownMeasurements == true" icon="icon-park-outline:up" width="20" height="20"
                class="text-black ml-2" />
        </div>
        <!-- Dropdown -->
        <div v-show="showDropdownMeasurements" class="z-10" v-debounce:400ms="myFn">
            <ul class="text-md text-black dark:text-black" aria-labelledby="dropdownTrigger">
                <li>
                    <div class="grid grid-col-1 lg:grid-cols-2 gap-x-4 gap-y-4 ml-2 mt-2 text-black font-lato text-sm">
                        <!-- Length -->
                        <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                            <SvgIcon :name="'length'" />
                            <span
                                class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Length</span>
                            <input type="text" class="border border-gray-500 rounded-sm px-2 py-1 w-20" />
                        </div>

                        <!-- Chest -->
                        <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                            <SvgIcon :name="'chest'" />
                            <span
                                class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Chest</span>
                            <input type="text" class="border border-gray-500 rounded-sm px-2 py-1 w-20" />
                        </div>

                        <!-- Arms -->
                        <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                            <SvgIcon :name="'Arms'" />
                            <span
                                class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Arms</span>
                            <input type="text" class="border border-gray-500 rounded-sm px-2 py-1 w-20" />
                        </div>

                        <!-- Sleeve length -->
                        <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                            <SvgIcon :name="'sleeve-length'" />
                            <span
                                class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Sleeve
                                length</span>
                            <input type="text" class="border border-gray-500 rounded-sm px-2 py-1 w-20" />
                        </div>

                        <!-- Back Neck -->
                        <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                            <SvgIcon :name="'back-neck'" />
                            <span
                                class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Back
                                Neck</span>
                            <input type="text" class="border border-gray-500 rounded-sm px-2 py-1 w-20" />
                        </div>

                        <!-- Shoulder -->
                        <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                            <SvgIcon :name="'shoulder'" />
                            <span
                                class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Shoulder</span>
                            <input type="text" class="border border-gray-500 rounded-sm px-2 py-1 w-20" />
                        </div>

                        <!-- Waist -->
                        <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                            <SvgIcon :name="'waist'" />
                            <span
                                class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Waist</span>
                            <input type="text" class="border border-gray-500 rounded-sm px-2 py-1 w-20" />
                        </div>

                        <!-- Seat -->
                        <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                            <SvgIcon :name="'seat'" />
                            <span
                                class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Seat</span>
                            <input type="text" class="border border-gray-500 rounded-sm px-2 py-1 w-20" />
                        </div>

                        <!-- Sleeve Circle -->
                        <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                            <SvgIcon :name="'sleeve-circle'" />
                            <span
                                class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Sleeve
                                Circle</span>
                            <input type="text" class="border border-gray-500 rounded-sm px-2 py-1 w-20" />
                        </div>

                        <!-- Front Neck -->
                        <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                            <SvgIcon :name="'front-neck'" />
                            <span
                                class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Front
                                Neck</span>
                            <input type="text" class="border border-gray-500 rounded-sm px-2 py-1 w-20" />
                        </div>
                    </div>

                </li>
            </ul>
        </div>
    </div>
</template>