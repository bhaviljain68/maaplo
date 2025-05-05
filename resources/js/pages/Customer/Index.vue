<script setup lang="ts">

import CustomerList from '@/components/CustomerList.vue';
import SearchList from '@/components/SearchIcon.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Icon } from '@iconify/vue';
import { Link } from '@inertiajs/vue3';
import { reactive, ref } from 'vue';
const showable = reactive({
    showSearch: false
});
const searchTerm = ref('');

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
// search function
// debounce the function to avoid too many calls
function myFn(val: string) {
    searchTerm.value = val
    // console.log('Searching  brj:', val)
}

</script>
<template>
    <AppLayout>
        <div class="lg:mx-auto max-w-7xl py-8 px-4">
            <div class="flex flex-row justify-between mb-6">
                <div>
                    <h1 class="text-[24px] mt-3 leading-[16px] font-bold tracking-[0] text-gray-800 font-[Convergence]">
                        Customer
                    </h1>
                    <p class="text-sm text-gray-700 text-right mt-2">
                        Your Customers: {{ props.customers.length }}
                    </p>
                </div>
                <div class="flex gap-4 text-gray-600">
                    <div>
                        <SearchList :showable="showable" />
                    </div>
                    <div class="mx-auto max-w-7xl w-full">
                        <!-- add customer details -->
                        <div class="relative group mt-1">
                            <Link :href="route('customers.create')">
                            <Icon icon="material-symbols:add-rounded" width="30" height="30" />
                            </Link>
                            <!-- Add lable for user move curser in add icon -->
                            <div
                                class="absolute top-full mt-2 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-100 transition bg-gray-800 text-white text-xs rounded py-1 px-2 pointer-events-none z-10">
                                Create Customer
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- search input -->
            <div class="mb-10" v-if="showable.showSearch">
                <input type="text" v-debounce:400ms="myFn" placeholder="Search..."
                    class="w-full lg:max-w-7xl border border-gray-300 rounded-full px-4 py-3 text-sm shadow-[0px_0px_4.3px_0px_#16789333] focus:outline-none focus:ring focus:border-gray-400 transition-all" />
            </div>
            <div>
                <CustomerList v-for="customer in props.customers" :key="customer.id" :customer="customer" />
            </div>
        </div>
    </AppLayout>
</template>
