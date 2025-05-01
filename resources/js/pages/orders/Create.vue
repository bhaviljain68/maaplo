<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { Icon } from '@iconify/vue';
import VueDatePicker from 'vue3-datepicker';
import { ref } from 'vue';
import SvgIcon from '@/components/SvgIcon.vue';
import WorkType from '@/components/Items/WorkType.vue';
import ItemType from '@/components/Items/ItemType.vue';
import Measurements from '@/components/Items/Measurements.vue';
import DesignDetails from '@/components/Items/DesignDetails.vue';
import Colors from '@/components/Items/Colors.vue';
import Notes from '@/components/Items/Notes.vue';
const showDropdown = ref(false);


const props = defineProps(["users", "customers"])

const selectedCustomer = ref('Select Customer');

function toggleDropdown() {
    showDropdown.value = !showDropdown.value;
}
function selectOption(name) {
    selectedCustomer.value = name;
    showDropdown.value = false;
}


</script>

<template>
    <AppLayout>
        <div class="px-4 py-8 max-w-6xl mx-auto">
            <div>
                <h1 class="text-[24px] leading-[16px] font-bold tracking-[0] text-gray-800 font-[Convergence]">
                    New Order
                </h1>
            </div>
            <div class="flex flex-col lg:mt-5 rounded-lg lg:border lg:border-primary p-0 lg:p-4">
                <h1 class="text-xl font-bold lg:mb-6 lg:mt-0 mt-6">Enter Details</h1>

                <div class="w-full border-b border-black flex justify-between items-center relative">
                    <!-- Dropdown Button -->
                    <div>
                        <button @click="toggleDropdown"
                            class="flex cursor-pointer items-center justify-between gap-2 py-2 bg-white rounded-md focus:outline-none">
                            <span class="font-lato text-base font-normal leading-4 tracking-normal">{{ selectedCustomer
                                }}</span>
                            <Icon :icon="showDropdown ? 'icon-park-outline:up' : 'icon-park-outline:down'" width="20"
                                height="20" />
                        </button>

                        <!-- Dropdown Menu -->
                        <div v-if="showDropdown"
                            class="absolute mt-2 w-full bg-white border border-gray-200 rounded-md shadow-lg z-50">
                            <ul class="py-1 text-sm text-gray-700">
                                <!-- Static Customer Option -->
                                <li>
                                    <div @click="selectOption('Riya Patel')"
                                        class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <h1 class="text-gray-800 font-medium text-[18px]">Riya Patel</h1>
                                            </div>
                                            <div>
                                                <img src="/images/Profile.png" alt="Customer Image"
                                                    class="w-8 h-8 rounded-full ml-4" />
                                            </div>
                                        </div>

                                    </div>
                                </li>
                                <li>
                                    <div @click="selectOption('Riya Patel')"
                                        class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <h1 class="text-gray-800 font-medium text-[18px]">Riya Patel</h1>
                                            </div>
                                            <div>
                                                <img src="/images/Profile.png" alt="Customer Image"
                                                    class="w-8 h-8 rounded-full ml-4" />
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Add Icon -->
                    <div>
                        <Icon icon="material-symbols:add-rounded" width="30" height="30" />
                    </div>
                </div>

                <!-- Delivery Date -->
                <div class="mt-5 flex flex-row gap-3">
                    <div>
                        <label class="font-lato text-base font-normal leading-4 tracking-normal">
                            Delivery Date <span class="text-red-500">*</span>
                        </label>
                    </div>
                    <div>
                        <!-- <VueDatePicker> -->
                        <!-- <template #input-icon> -->
                        <Icon icon="pixel:calender-solid" width="24" height="24" />
                        <!-- </template> -->
                        <!-- </VueDatePicker> -->
                    </div>
                </div>

                <!-- items -->
                <div class="mt-5">
                    <div>
                        <label class="font-lato text-base font-normal leading-4 tracking-normal">
                            Items
                        </label>
                        <div class="bg-white mt-5 p-4 shadow-[0_0_7.6px_0_#BDDBDB9C]  rounded-[10px] relative">
                            <!-- work type -->
                            <WorkType />

                            <!-- Item Type -->
                            <ItemType />

                            <!-- Measurements -->
                            <Measurements />

                            <!-- Design Details-->
                            <DesignDetails />

                            <!-- color / notes -->
                            <div class="flex flex-col lg:flex-row justify-between">
                                <Colors />
                                <Notes />
                            </div>

                            <!-- Refference dress given? -->
                            <div class="flex items-center gap-4 mt-3">
                                <h1 class="font-normal text-[16px] leading-4 tracking-normal font-lato">
                                    Reference dress given?
                                </h1>

                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-300 rounded-full peer dark:bg-gray-700 peer-checked:bg-primary transition duration-300">
                                    </div>
                                    <div
                                        class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full transition-transform duration-300 transform peer-checked:translate-x-full">
                                    </div>
                                </label>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </AppLayout>
</template>