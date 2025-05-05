<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { Icon } from '@iconify/vue';
import DateIcon from '@/components/DateIcon.vue';
import CustomerListDropdown from '@/components/Items/CustomerListDropdown.vue';
import { reactive, ref } from 'vue';
import ItemModel from '@/components/Items/ItemModel.vue';
const props = defineProps(["users", "customers"])
const showModal = ref(false);
const items = reactive([]);
function handleAddItem(newItem) {
    console.log("New item added:", newItem);

    items.push(newItem);
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
                            <div @click="showModal = true" class="cursor-pointer inline-block">
                                <Icon icon="material-symbols:add-rounded" width="20" height="20" />
                            </div>
                        </div>
                        <!-- Modal Backdrop -->
                        <div v-if="showModal" class="fixed inset-0 bg-black/50 z-40" @click.self="showModal = false">
                        </div>

                        <!-- Modal Content -->
                        <ItemModel :showModal="showModal" @close="showModal = false" @handleAddItem="handleAddItem" />

                        <!-- table -->
                        <!-- Items Table -->
                        <div class="mt-4 overflow-x-auto">
                            <table class="min-w-full border border-gray-300 text-sm text-left">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="p-2 border">Work Type</th>
                                        <th class="p-2 border">Item type</th>
                                        <th class="p-2 border">Delivery Date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in items" :key="index">
                                        <td class="p-2 border">{{ item.workType }}</td>
                                        <td class="p-2 border">{{ item.itemType }}</td>
                                        <td class="p-2 border">{{ item.deliveryDate }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </AppLayout>
</template>