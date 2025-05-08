<script setup>
import ItemTemplateList from '@/components/ItemTemplateList.vue';
import AppLayout from '@/layouts/AppLayout.vue';
defineProps({ items: Array });
</script>


<template>
    <AppLayout>
        <div class="lg:mx-auto max-w-7xl py-8 px-4">
            <div class="flex gap-4 text-gray-600">
                <div>
                    <h1 class="text-[24px] mt-3 leading-[16px] font-bold tracking-[0] text-gray-800 font-[Convergence]">
                       Item's Template
                    </h1>
                </div>
            </div>
            <div>
                <ItemTemplateList v-for="item in items" :key="item.id" :item="item"/>
            </div>
        </div>
    </AppLayout>
</template>
