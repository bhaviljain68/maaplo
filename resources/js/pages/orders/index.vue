<script setup>
import FilterList from '@/components/FilterList.vue';
import OrderList from '@/components/OrderList.vue';
import SearchList from '@/components/SearchList.vue';
import AppLayout from '@/layouts/AppLayout.vue';

</script>
<template>
    <AppLayout>
        <div class="lg:mx-auto max-w-7xl py-8 px-4">
            <div class="flex flex-row justify-between">
                <div>
                    <h1 class="text-[24px] mt-3 leading-[16px] font-bold tracking-[0] text-gray-800 font-[Convergence]">
                        Orders
                    </h1>
                </div>
                <div class="flex gap-4 text-gray-600">
                    <SearchList />
                    <FilterList />
                </div>
            </div>
            <div class="px-4 mt-10 py-6 gap-[10px] rounded-[10px] shadow-[0px_0px_8.6px_0px_#005FAF40]">
                <!-- Orders list -->
                <div class="space-y-4">
                    <OrderList :bgColor="'#FFFCE6'" :borderColor="'#837200'" />
                    <OrderList :bgColor="'#EAF5FF'" :borderColor="'#005FAF'" />
                    <OrderList :bgColor="'#FFFFFF'" :borderColor="'#828282'" />
                    <OrderList :bgColor="'#FFEAEA'" :borderColor="'#FF0000'" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>