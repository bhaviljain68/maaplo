<script setup lang="ts">

import CustomerList from '@/components/CustomerList.vue';
import SearchList from '@/components/SearchIcon.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Icon } from '@iconify/vue';
import { Link } from '@inertiajs/vue3';
const props = defineProps<{
    customers: Array<{
        id: number,
        name: string,
        email: string,
        phone: string,
        address: string,
        gender: string,
        active_orders?: number,
        payment_due?: number
    }>
}>();
</script>
<template>
    <AppLayout>
        <div class="lg:mx-auto max-w-7xl py-8 px-4">
            <div class="flex flex-row justify-between mb-10">
                <div>
                    <h1 class="text-[24px] mt-3 leading-[16px] font-bold tracking-[0] text-gray-800 font-[Convergence]">
                        Customer
                    </h1>
                </div>
                <div class="flex gap-4 text-gray-600">
                    <div>
                        <SearchList />
                    </div>
                    <div class="mx-auto max-w-7xl w-full">
                        <!-- add customer details -->
                        <div class="mt-1">
                            <Link :href="route('customers.create')">
                            <Icon icon="material-symbols:add-rounded" width="30" height="30" />
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <CustomerList v-for="customer in props.customers" :key="customer.id" :customer="customer" />
            </div>
        </div>
    </AppLayout>
</template>
