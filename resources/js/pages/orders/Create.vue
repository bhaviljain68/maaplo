<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { Icon } from '@iconify/vue';
import VueDatePicker from 'vue3-datepicker';
import { ref } from 'vue';
import SvgIcon from '@/components/SvgIcon.vue';
const showDropdown = ref(false);
const showDropdownItemType = ref(false);
const showDropdownWorkType = ref(false);
const showDropdownMeasurements = ref(false);
const showDropdownDesignDetails = ref(false);
const showDropdownFrontNeckDesign = ref(false);
const showDropdownBackNeckDesign = ref(false);
const showDropdownSleeveType = ref(false);
const props = defineProps(["users", "customers"])

const selectedCustomer = ref('Select Customer');

function toggleDropdown() {
    showDropdown.value = !showDropdown.value;
}
function selectOption(name) {
    selectedCustomer.value = name;
    showDropdown.value = false;
}
function toggleDropdownWorkType() {
    showDropdownWorkType.value = !showDropdownWorkType.value;
}
function toggleDropdownItemType() {
    showDropdownItemType.value = !showDropdownItemType.value;
}
function toggleDropdownMeasurements() {
    showDropdownMeasurements.value = !showDropdownMeasurements.value;
}
function toggleDropdownDesignDetails() {
    showDropdownDesignDetails.value = !showDropdownDesignDetails.value;
}
function toggleDropdownFrontNeckDesign() {
    showDropdownFrontNeckDesign.value = !showDropdownFrontNeckDesign.value;
}
function toggleDropdownBackNeckDesign() {
    showDropdownBackNeckDesign.value = !showDropdownBackNeckDesign.value;
}
function toggleDropdownSleeveType() {
    showDropdownSleeveType.value = !showDropdownSleeveType.value;
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

                        <div class="bg-white mt-5 p-6 shadow-[0_0_7.6px_0_#BDDBDB9C]  rounded-[10px] relative">
                            <!-- work type -->
                            <div>
                                <div @click="toggleDropdownWorkType()" class="flex">
                                    <h1 class="font-normal text-md leading-4 tracking-normal font-lato">Work Type</h1>
                                    <Icon v-if="showDropdownWorkType == false" icon="icon-park-outline:down" width="20"
                                        height="20" class="text-black ml-2" />
                                    <Icon v-if="showDropdownWorkType == true" icon="icon-park-outline:up" width="20"
                                        height="20" class="text-black ml-2" />
                                </div>
                                <!-- Dropdown -->
                                <div v-show="showDropdownWorkType" class="z-10" v-debounce:400ms="myFn">
                                    <ul class="text-md text-black dark:text-black" aria-labelledby="dropdownTrigger">
                                        <li>
                                            <div class="flex flex-col ml-2 gap-3 text-black mt-2">
                                                <div>
                                                    <h1 class="font-normal text-sm leading-4 tracking-normal font-lato">
                                                        New
                                                        from Material
                                                    </h1>
                                                </div>
                                                <div>
                                                    <h1 class="font-normal text-sm leading-4 tracking-normal font-lato">
                                                        Only
                                                        Stitching</h1>
                                                </div>
                                                <div>
                                                    <h1 class="font-normal text-sm leading-4 tracking-normal font-lato">
                                                        Only
                                                        Altering</h1>
                                                </div>

                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Item Type -->
                            <div class="mt-5">
                                <div @click="toggleDropdownItemType()" class="flex">
                                    <h1 class="font-normal text-md leading-4 tracking-normal font-lato">Item Type</h1>
                                    <Icon v-if="showDropdownItemType == false" icon="icon-park-outline:down" width="20"
                                        height="20" class="text-black ml-2" />
                                    <Icon v-if="showDropdownItemType == true" icon="icon-park-outline:up" width="20"
                                        height="20" class="text-black ml-2" />
                                </div>
                                <!-- Dropdown -->
                                <div v-show="showDropdownItemType" class="z-10" v-debounce:400ms="myFn">
                                    <ul class="text-md text-black dark:text-black" aria-labelledby="dropdownTrigger">
                                        <li>
                                            <div class="flex flex-col ml-2  gap-2 text-black mt-2">
                                                <div>
                                                    <h1 class="font-normal text-sm leading-4 tracking-normal font-lato">
                                                        Kurta
                                                    </h1>
                                                </div>
                                                <div>
                                                    <h1 class="font-normal text-sm leading-4 tracking-normal font-lato">
                                                        Shirt</h1>

                                                </div>
                                                <div>
                                                    <h1 class="font-normal text-sm leading-4 tracking-normal font-lato">
                                                        Kurti</h1>
                                                </div>
                                                <div>
                                                    <h1 class="font-normal text-sm leading-4 tracking-normal font-lato">
                                                        Pajama</h1>
                                                </div>

                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Measurements -->
                            <div class="mt-5">
                                <div @click="toggleDropdownMeasurements()" class="flex">
                                    <h1 class="font-normal text-md leading-4 tracking-normal font-lato">Measurements
                                    </h1>
                                    <Icon v-if="showDropdownMeasurements == false" icon="icon-park-outline:down"
                                        width="20" height="20" class="text-black ml-2" />
                                    <Icon v-if="showDropdownMeasurements == true" icon="icon-park-outline:up" width="20"
                                        height="20" class="text-black ml-2" />
                                </div>
                                <!-- Dropdown -->
                                <div v-show="showDropdownMeasurements" class="z-10" v-debounce:400ms="myFn">
                                    <ul class="text-md text-black dark:text-black" aria-labelledby="dropdownTrigger">
                                        <li>
                                            <div
                                                class="grid grid-col-1 lg:grid-cols-2 gap-x-4 gap-y-4 ml-2 mt-2 text-black font-lato text-sm">
                                                <!-- Length -->
                                                <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                                                    <SvgIcon :name="'length'" />
                                                    <span
                                                        class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Length</span>
                                                    <input type="text"
                                                        class="border border-gray-500 rounded-sm px-2 py-1 w-20" />
                                                </div>

                                                <!-- Chest -->
                                                <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                                                    <SvgIcon :name="'chest'" />
                                                    <span
                                                        class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Chest</span>
                                                    <input type="text"
                                                        class="border border-gray-500 rounded-sm px-2 py-1 w-20" />
                                                </div>

                                                <!-- Arms -->
                                                <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                                                    <SvgIcon :name="'Arms'" />
                                                    <span
                                                        class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Arms</span>
                                                    <input type="text"
                                                        class="border border-gray-500 rounded-sm px-2 py-1 w-20" />
                                                </div>

                                                <!-- Sleeve length -->
                                                <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                                                    <SvgIcon :name="'sleeve-length'" />
                                                    <span
                                                        class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Sleeve
                                                        length</span>
                                                    <input type="text"
                                                        class="border border-gray-500 rounded-sm px-2 py-1 w-20" />
                                                </div>

                                                <!-- Back Neck -->
                                                <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                                                    <SvgIcon :name="'back-neck'" />
                                                    <span
                                                        class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Back
                                                        Neck</span>
                                                    <input type="text"
                                                        class="border border-gray-500 rounded-sm px-2 py-1 w-20" />
                                                </div>

                                                <!-- Shoulder -->
                                                <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                                                    <SvgIcon :name="'shoulder'" />
                                                    <span
                                                        class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Shoulder</span>
                                                    <input type="text"
                                                        class="border border-gray-500 rounded-sm px-2 py-1 w-20" />
                                                </div>

                                                <!-- Waist -->
                                                <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                                                    <SvgIcon :name="'waist'" />
                                                    <span
                                                        class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Waist</span>
                                                    <input type="text"
                                                        class="border border-gray-500 rounded-sm px-2 py-1 w-20" />
                                                </div>

                                                <!-- Seat -->
                                                <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                                                    <SvgIcon :name="'seat'" />
                                                    <span
                                                        class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Seat</span>
                                                    <input type="text"
                                                        class="border border-gray-500 rounded-sm px-2 py-1 w-20" />
                                                </div>

                                                <!-- Sleeve Circle -->
                                                <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                                                    <SvgIcon :name="'sleeve-circle'" />
                                                    <span
                                                        class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Sleeve
                                                        Circle</span>
                                                    <input type="text"
                                                        class="border border-gray-500 rounded-sm px-2 py-1 w-20" />
                                                </div>

                                                <!-- Front Neck -->
                                                <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                                                    <SvgIcon :name="'front-neck'" />
                                                    <span
                                                        class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Front
                                                        Neck</span>
                                                    <input type="text"
                                                        class="border border-gray-500 rounded-sm px-2 py-1 w-20" />
                                                </div>
                                            </div>

                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Design Details-->
                            <div class="mt-5">
                                <div @click="toggleDropdownDesignDetails()" class="flex">
                                    <h1 class="font-normal text-md leading-4 tracking-normal font-lato"> Design Details
                                    </h1>
                                    <Icon v-if="showDropdownDesignDetails == false" icon="icon-park-outline:down"
                                        width="20" height="20" class="text-black ml-2" />
                                    <Icon v-if="showDropdownDesignDetails == true" icon="icon-park-outline:up"
                                        width="20" height="20" class="text-black ml-2" />
                                </div>
                                <!-- Dropdown -->
                                <div v-show="showDropdownDesignDetails" class="z-10" v-debounce:400ms="myFn">
                                    <ul class="text-md text-black dark:text-black" aria-labelledby="dropdownTrigger">
                                        <li>
                                            <!--  Front Neck Design -->
                                            <div>
                                                <div @click="toggleDropdownFrontNeckDesign()" class="flex">
                                                    <h1
                                                        class="font-normal ml-3 mt-3 text-md leading-4 tracking-normal font-lato">
                                                        Front Neck Design
                                                    </h1>
                                                    <Icon v-if="showDropdownFrontNeckDesign == false"
                                                        icon="icon-park-outline:down" width="20" height="20"
                                                        class="text-black ml-2 mt-3" />
                                                    <Icon v-if="showDropdownFrontNeckDesign == true"
                                                        icon="icon-park-outline:up" width="20" height="20"
                                                        class="text-black ml-2 mt-3" />
                                                </div>
                                                <!-- Dropdown -->
                                                <div v-show="showDropdownFrontNeckDesign" class="z-10"
                                                    v-debounce:400ms="myFn">
                                                    <ul class="text-md text-black dark:text-black"
                                                        aria-labelledby="dropdownTrigger">
                                                        <li>
                                                            <div
                                                                class="flex flex-row gap-5 lg:ml-10 ml-5 py-5 text-black font-lato text-sm">
                                                                <div>
                                                                    <!-- <img src="/images/V Neck.png" alt="V Neck"> -->
                                                                     <SvgIcon :name="'v-neck'" />
                                                                    <h1
                                                                        class="font-medium mt-3 text-[10px] leading-[8px] tracking-normal text-center font-lato">
                                                                        V Neck</h1>

                                                                </div>
                                                                <div>
                                                                 <SvgIcon :name="'square-neck'" />
                                                                    <h1
                                                                        class="font-medium mt-3 text-[10px] leading-[8px] tracking-normal text-center font-lato">
                                                                        Square Neck</h1>
                                                                </div>
                                                                <div>
                                                                   <SvgIcon :name="'halter-neck'" />
                                                                    <h1
                                                                        class="font-medium mt-3 text-[10px] leading-[8px] tracking-normal text-center font-lato">
                                                                        Halter Neck</h1>
                                                                </div>
                                                                <div>
                                                                   <SvgIcon :name="'round-neck'" />
                                                                    <h1
                                                                        class="font-medium mt-3 text-[10px] leading-[8px] tracking-normal text-center font-lato">
                                                                        Round Neck</h1>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <!--  Back Neck Design -->
                                            <div>
                                                <div @click="toggleDropdownBackNeckDesign()" class="flex">
                                                    <h1
                                                        class="font-normal ml-3 mt-3 text-md leading-4 tracking-normal font-lato">
                                                        Back Neck Design
                                                    </h1>
                                                    <Icon v-if="showDropdownBackNeckDesign == false"
                                                        icon="icon-park-outline:down" width="20" height="20"
                                                        class="text-black ml-2 mt-3" />
                                                    <Icon v-if="showDropdownBackNeckDesign == true"
                                                        icon="icon-park-outline:up" width="20" height="20"
                                                        class="text-black ml-2 mt-3" />
                                                </div>
                                            </div>

                                            <!--  Sleeve Type -->
                                            <div>
                                                <div @click="toggleDropdownSleeveType()" class="flex">
                                                    <h1
                                                        class="font-normal ml-3 mt-3 text-md leading-4 tracking-normal font-lato">
                                                        Sleeve Type
                                                    </h1>
                                                    <Icon v-if="showDropdownSleeveType == false"
                                                        icon="icon-park-outline:down" width="20" height="20"
                                                        class="text-black ml-2 mt-3" />
                                                    <Icon v-if="showDropdownSleeveType == true"
                                                        icon="icon-park-outline:up" width="20" height="20"
                                                        class="text-black ml-2 mt-3" />
                                                </div>
                                            </div>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>

    </AppLayout>
</template> 
