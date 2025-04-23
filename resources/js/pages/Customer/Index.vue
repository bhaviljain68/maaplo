<script setup>
import CreateOrEditCustomer from '@/components/CreateOrEditCustomer.vue';
import CustomerList from '@/components/CustomerList.vue';
import SearchList from '@/components/SearchList.vue';
import AppLayout from '@/layouts/AppLayout.vue';

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
                    <SearchList />
                    <CreateOrEditCustomer />
                </div>
            </div>
            <div>
                <CustomerList v-for="i in 5"/>
            </div>
        </div>
    </AppLayout>
</template>
