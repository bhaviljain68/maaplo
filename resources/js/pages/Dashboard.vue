<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Icon } from '@iconify/vue';
import Chart from '@/components/Chart.vue';
import { Link } from "@inertiajs/vue3";
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
                <div class="relative inline-block text-left w-26">
                    <select
                        class="block w-full appearance-none border-none px-4 py-2 pr-8 text-[20px] leading-[16px] font-medium tracking-[0] focus:outline-none focus:ring-1 focus:ring-indigo-500 font-[Inter]">
                        <option>Yesterday</option>
                        <option>7 Days Ago</option>
                        <option>1 Month Ago</option>
                        <option>1 Year Ago</option>
                    </select>

                    <!-- Down Icon from Iconify -->
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-black">
                        <Icon icon="formkit:down" width="16" height="16" />
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
