<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Icon } from '@iconify/vue';
import Chart from '@/components/Chart.vue';
import { Link } from "@inertiajs/vue3";
import { ref } from 'vue';
const showDropdown = ref(false);
const selectedOption = ref('Yesterday'); // Default text inside input

function toggleDropdown() {
    showDropdown.value = !showDropdown.value;
}

function selectOption(option) {
    selectedOption.value = option;
    showDropdown.value = false;
}
const activeTab = ref('order')
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
                    <!-- <h1 class="font-normal text-[20px] leading-[16px] tracking-[0] font-[Convergence]">Graph</h1> -->
                </div>
                <div>
                    <div class="relative">
                        <button @click="toggleDropdown" class="flex items-center justify-between w-40 px-4 py-2 bg-white
                             rounded-md focus:outline-none">
                            <span>{{ selectedOption }}</span>
                            <Icon :icon="showDropdown ? 'icon-park-outline:up' : 'icon-park-outline:down'" width="20"
                                height="20" />
                        </button>

                        <div v-show="showDropdown"
                            class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-md shadow-lg z-50">
                            <ul class="py-1 text-sm text-gray-700">
                                <li>
                                    <button @click="selectOption('Yesterday')"
                                        class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                        Yesterday
                                    </button>
                                </li>
                                <li>
                                    <button @click="selectOption('7 Days Ago')"
                                        class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                        7 Days Ago
                                    </button>
                                </li>
                                <li>
                                    <button @click="selectOption('1 Month Ago')"
                                        class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                        1 Month Ago
                                    </button>
                                </li>
                                <li>
                                    <button @click="selectOption('1 Year Ago')"
                                        class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                        1 Year Ago
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column Labels for Chart -->
            <div class="flex flex-row justify-between mt-5">
                <div class="relative">
                    <a @click="activeTab = 'order'" :class="[
                        'cursor-pointer font-[Lato] font-medium text-[20px] leading-[16px] tracking-[0] pb-2 relative z-10',
                        activeTab === 'order' ? 'text-[#167893]' : 'text-black'
                    ]">
                        Order
                    </a>
                    <div class="absolute bottom-0 left-0 h-0.5 bg-[#167893] transition-all duration-500" :style="{
                        width: activeTab === 'order' ? '100%' : '0%'
                    }"></div>
                </div>
                <div class="relative">
                    <a @click="activeTab = 'customer'" :class="[
                        'cursor-pointer font-[Lato] font-medium text-[20px] leading-[16px] tracking-[0] pb-2 relative z-10',
                        activeTab === 'customer' ? 'text-[#167893]' : 'text-black'
                    ]">
                        Customer
                    </a>
                    <div class="absolute bottom-0 left-0 h-0.5 bg-[#167893] transition-all duration-500" :style="{
                        width: activeTab === 'customer' ? '100%' : '0%'
                    }"></div>
                </div>

                <div class="relative">
                    <a @click="activeTab = 'revenue'" :class="[
                        'cursor-pointer font-[Lato] font-medium text-[20px] leading-[16px] tracking-[0] pb-2 relative z-10',
                        activeTab === 'revenue' ? 'text-[#167893]' : 'text-black'
                    ]">
                        Revenue
                    </a>
                    <div class="absolute bottom-0 left-0 h-0.5 bg-[#167893] transition-all duration-500" :style="{
                        width: activeTab === 'revenue' ? '100%' : '0%'
                    }"></div>
                </div>
            </div>
            <!-- Chart Component Section -->
            <div class="">
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
                    <Link :href="route('customers.create')" class="font-[Lato] font-normal text-[18px] tracking-[0]">
                    Create Customer
                    </Link>
                </div>
                <div>
                    <Link :href="route('orders.create')" class="font-[Lato] font-normal text-[18px] tracking-[0]">Create
                    Order</Link>
                </div>
                <div>
                    <a class="font-[Lato] font-normal text-[18px] tracking-[0]">Close Order</a>
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
                    <Link :href="route('customers.index')" class="font-[Lato] font-normal text-[18px] tracking-[0]">
                    Customer List
                    </Link>
                </div>
                <div>
                    <Link :href="route('orders.index')" class="font-[Lato] font-normal text-[18px] tracking-[0]">Order
                    List</Link>
                </div>

            </div>
        </div>

    </AppLayout>
</template>
