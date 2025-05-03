<script setup>
import { ref } from 'vue';
import { Icon } from '@iconify/vue';
import { Link } from '@inertiajs/vue3';
const selectedCustomer = ref('Select Customer');
const showDropdown = ref(false);
function toggleDropdown() {
    showDropdown.value = !showDropdown.value;
}
function selectOption(name) {
    selectedCustomer.value = name;
    showDropdown.value = false;
}

</script>
<template>
    <div class="w-full border-b border-black flex justify-between items-center relative">
        <!-- Dropdown Button -->
        <div>
            <button @click="toggleDropdown"
                class="flex cursor-pointer items-center justify-between gap-2 py-2 bg-white rounded-md focus:outline-none">
                <span class="font-lato text-base font-normal leading-4 tracking-normal">{{ selectedCustomer
                    }}</span>
                <Icon :icon="showDropdown ? 'icon-park-outline:up' : 'icon-park-outline:down'" width="20" height="20" />
            </button>

            <!-- Dropdown Menu -->
            <div v-if="showDropdown"
                class="absolute mt-2 w-full bg-white border border-gray-200 rounded-md shadow-lg z-50">
                <ul class="py-1 text-sm text-gray-700">
                    <!-- Static Customer Option -->
                    <li>
                        <div @click="selectOption('Riya Patel')" class="w-full text-left px-4 py-2 hover:bg-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h1 class="text-gray-800 font-medium text-[18px]">Riya Patel</h1>
                                </div>
                                <div>
                                    <img src="/images/Profile.png" alt="Customer Image"
                                        class="w-8 h-8 rounded-full ml-4" />
                                </div>
                            </div>

                        </div>
                    </li>
                    <li>
                        <div @click="selectOption('Riya Patel')" class="w-full text-left px-4 py-2 hover:bg-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h1 class="text-gray-800 font-medium text-[18px]">Riya Patel</h1>
                                </div>
                                <div>
                                    <img src="/images/Profile.png" alt="Customer Image"
                                        class="w-8 h-8 rounded-full ml-4" />
                                </div>
                            </div>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Add Icon -->
        <div>
            <Link :href="route('customers.create')" ><Icon icon="material-symbols:add-rounded" width="20" height="20" /></Link>
        </div>
    </div>
</template>