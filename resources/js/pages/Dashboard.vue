<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Icon } from '@iconify/vue';
import Chart from '@/components/Chart.vue';
import { Link } from "@inertiajs/vue3";
import { ref } from 'vue';
const showDropdown = ref(false);
function toggleDropdown() {
    showDropdown.value = !showDropdown.value;
}
</script>

<template>

    <Head title="Dashboard" />
    <AppLayout>
        <div class="mx-auto max-w-7xl px-4 py-8 w-full">
            <h1 class="text-[24px] leading-[16px] font-bold tracking-[0] text-gray-800 font-[Convergence]">Total Orders
            </h1>
            <!-- Graph Section Header with Filter Dropdown -->
            <div class="flex flex-row justify-between mt-8">
                <div>
                    <h1 class="font-normal text-[20px] leading-[16px] tracking-[0] font-[Convergence]">Graph</h1>
                </div>
                <div>
                    <div @click="toggleDropdown()">
                        <div class="flex">
                            <h1
                                class="font-[Lato] font-medium text-[18px] leading-[16px] tracking-[0] text-black p-2 cursor-pointer">
                                Yesterday
                            </h1>
                            <Icon v-if="showDropdown == false" icon="icon-park-outline:down" width="20" height="20"
                                class="mt-[5px]" />
                            <Icon v-if="showDropdown == true" icon="icon-park-outline:up" width="20" height="20"
                                class="mt-[5px]" />
                        </div>
                    </div>

                    <!-- Dropdown -->
                    <div v-show="showDropdown" class="mt-2 z-10 bg-white rounded-lg shadow-lg">
                        <ul class="text-sm text-gray-700 dark:text-gray-200">

                            <li>
                                <div class="flex flex-row ml-2">
                                    <a href="#" class="text-black">
                                        7 Days Ago </a>
                                </div>
                            </li>

                            <li>
                                <div class="flex flex-row ml-2 py-2">
                                    <a href="#" class="block text-black">1 Month Ago</a>
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-row ml-2">
                                    <a href="#" class="block text-black">1 Year Ago</a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- Column Labels for Chart -->
            <div class="flex flex-row justify-between mt-5">
                <div>
                    <h1 class="font-[Lato] font-medium text-[16px] leading-[16px] tracking-[0] text-[#167893]">Order
                    </h1>
                </div>
                <div>
                    <h1 class="font-[Lato] font-medium text-[16px] leading-[16px] tracking-[0]">Customer</h1>
                </div>
                <div>
                    <h1 class="font-[Lato] font-medium text-[16px] leading-[16px] tracking-[0]">Revenue</h1>
                </div>
            </div>

            <!-- Chart Component Section -->
            <div>
                <Chart />
            </div>

            <!-- Quick Links Section -->
            <div class="mt-10 flex gap-4 flex-col">
                <div>
                    <h1 class="font-[Convergence] font-normal text-[24px] tracking-[0]">
                        Quick Links
                    </h1>
                </div>
                <div>
                    <Link :href="route('customers.create')" class="font-[Lato] font-normal text-[16px] tracking-[0]">
                    Create Customer
                    </Link>
                </div>
                <div>
                    <Link :href="route('orders.create')" class="font-[Lato] font-normal text-[16px] tracking-[0]">Create
                    Order</Link>
                </div>
                <div>
                    <a class="font-[Lato] font-normal text-[16px] tracking-[0]">Close Order</a>
                </div>
            </div>

            <!-- Data Section Links -->
            <div class="mt-10 flex gap-4 flex-col">
                <div>
                    <h1 class="font-[Convergence] font-normal text-[24px] tracking-[0]">
                        Data
                    </h1>
                </div>
                <div>
                    <Link :href="route('customers.index')" class="font-[Lato] font-normal text-[16px] tracking-[0]">
                    Customer List
                    </Link>
                </div>
                <div>
                    <Link :href="route('orders.index')" class="font-[Lato] font-normal text-[16px] tracking-[0]">Order
                    List</Link>
                </div>

            </div>
        </div>

    </AppLayout>
</template>
