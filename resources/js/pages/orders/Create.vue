<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { Icon } from '@iconify/vue';
import WorkType from '@/components/Items/WorkType.vue';
import ItemType from '@/components/Items/ItemType.vue';
import Measurements from '@/components/Items/Measurements.vue';
import DesignDetails from '@/components/Items/DesignDetails.vue';
import Colors from '@/components/Items/Colors.vue';
import Notes from '@/components/Items/Notes.vue';
import Date from '@/components/Date.vue';
import DateIcon from '@/components/DateIcon.vue';
import ToggleButton from '@/components/ToggleButton.vue';
import ClothImage from '@/components/Items/ClothImage.vue';
import PatternImage from '@/components/Items/PatternImage.vue';
import CustomerListDropdown from '@/components/Items/CustomerListDropdown.vue';
const props = defineProps(["users", "customers"])

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
                <!-- selected customer list -->
                <CustomerListDropdown />

                <!-- Delivery Date -->
                <DateIcon />

                <!-- items -->
                <div class="mt-5">
                    <div>
                        <div class="flex flex-row justify-between items-center">
                            <div>
                                <label class="font-lato text-base font-normal leading-4 tracking-normal">
                                    Items
                                </label>
                            </div>
                            <!-- Add Icon -->
                            <div>
                                <Icon icon="material-symbols:add-rounded" width="20" height="20" />
                            </div>
                        </div>
                        <div class="bg-white mt-3 p-4 shadow-[0_0_7.6px_0_#BDDBDB9C]  rounded-[10px] relative">
                            <!-- work type -->
                            <WorkType />

                            <!-- Item Type -->
                            <ItemType />

                            <!-- Measurements -->
                            <Measurements />

                            <!-- Design Details-->
                            <DesignDetails />

                            <!-- color / notes -->
                            <div class="flex flex-col">
                                <Colors />
                                <Notes />
                            </div>

                            <!-- Refference dress given? -->
                            <div class="flex items-center gap-4 mt-3">
                                <h1 class="font-normal text-[16px] leading-4 tracking-normal font-lato">
                                    Reference dress given?
                                </h1>
                                <ToggleButton />
                            </div>
                            <!-- Trail Date -->
                            <Date />
                            <!-- Mark as Urgent -->
                            <div class="flex items-center gap-4 mt-5">
                                <h1 class="font-normal text-[16px] leading-4 tracking-normal font-lato">
                                    Mark as Urgent
                                </h1>
                                <ToggleButton />
                            </div>

                            <!-- Cloth Images -->
                            <div class="flex flex-col lg:flex-row justify-between">
                                <ClothImage />
                                <PatternImage />
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </AppLayout>
</template>