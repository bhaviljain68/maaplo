<script setup>
import { Icon } from '@iconify/vue';
import { Link, router } from '@inertiajs/vue3';
import { ref } from 'vue';
import Button from './Button.vue';
const toast = new ToastMagic();

const props = defineProps({
    customer: {
        type: Object,
        required: true
    }
});

const showDropdown = ref(false);
const showDeletePopup = ref(false);

const confirmDelete = () => {
    showDeletePopup.value = true;
};

const cancelDelete = () => {
    showDeletePopup.value = false;
};

const proceedDelete = () => {
    softDeleteCustomer(props.customer.id);
    showDeletePopup.value = false;
};

const toggleDropdown = () => {
    showDropdown.value = !showDropdown.value;
};

const softDeleteCustomer = (customerId) => {
    router.delete(route('customers.destroy', customerId), {
        onSuccess: () => {
            toast.success('Customer deleted successfully!');
            router.reload();
        },
        onError: () => {
            toast.error('Failed to delete customer.');
        }
    });
};
</script>

<template>
    <div class="gap-[10px] mt-5 h-full rounded-[10px] px-[10px] py-[17px] bg-[#DEEFF4]">
        <!-- Top section with Name and Face Image -->
        <div class="flex items-center justify-between px-2">
            <h1 class="font-[Lato] font-medium text-[18px] leading-[16px] text-black">
                {{ props.customer.name }}
            </h1>
            <img v-if="props.customer.face_image" :src="props.customer.face_image" alt="Face Image"
                class="w-16 h-16 object-cover rounded-full border border-gray-300" />
        </div>
        <!-- Dropdown Trigger -->
        <div @click="toggleDropdown()" class="flex items-center gap-2 cursor-pointer px-2 py-2">
            <h1 class="font-[Lato] font-medium text-[18px] text-black">Contact</h1>
            <Icon :icon="showDropdown ? 'icon-park-outline:up' : 'icon-park-outline:down'" width="20" height="20" />
        </div>

        <!-- Dropdown Content -->
        <div v-show="showDropdown" class="mt-2 z-10 px-4">
            <ul class="text-sm text-gray-700 space-y-2">
                <!-- Phone -->
                <li>
                    <div class="flex items-center gap-2">
                        <Icon icon="ic:baseline-phone" width="16" height="16" />
                        <span class="text-black">{{ props.customer.phone }}</span>
                    </div>
                </li>

                <!-- Email -->
                <li>
                    <div class="flex items-center gap-2">
                        <Icon icon="ic:outline-email" width="18" height="18" />
                        <span class="text-black">
                            {{ props.customer.email ? props.customer.email : 'Email Not Available' }}
                        </span>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Active Orders -->
        <h1 class="font-[Lato] font-medium text-[18px] text-black p-2">
            Active Order : {{ props.customer.active_orders ? props.customer.active_orders : 'N/A' }}
        </h1>

        <!-- Payment Due -->
        <h1 class="font-[Lato] font-medium text-[18px] text-black p-2">
            Payment Due : ₹ {{ props.customer.payment_due ? props.customer.payment_due : '0.00' }}
        </h1>

        <!-- Total Payment -->
        <h1 class="font-[Lato] font-medium text-[18px] text-black p-2">
            Total Payment : ₹ 0.00
        </h1>

        <!-- Edit & Delete Icons with Tooltips -->
        <div class="flex justify-end gap-3">
            <!-- Edit -->
            <div class="relative group">
                <Link :href="route('customers.edit', props.customer.id)">
                <Icon icon="ri:edit-fill" width="18" height="18" class="text-[#005FAF]" />
                </Link>
                <div
                    class="absolute top-full mt-2 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-100 transition bg-gray-800 text-white text-xs rounded py-1 px-2 pointer-events-none z-10">
                    Edit
                </div>
            </div>

            <!-- Delete -->
            <div class="relative group">
                <button @click="confirmDelete" class="flex items-center text-red-500 hover:text-red-600 transition">
                    <Icon icon="ic:baseline-delete" width="18" height="18" class="text-[#E73939]" />
                </button>
                <div
                    class="absolute top-full mt-2 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-100 transition bg-gray-800 text-white text-xs rounded py-1 px-2 pointer-events-none z-10">
                    Delete
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Popup -->
        <div v-if="showDeletePopup"
            class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg mx-5 lg:w-1/3">
                <h2 class="text-xl font-bold mb-4">Are you sure?</h2>
                <p class="mb-4 text-md lg:text-lg text-black font-semibold">
                    <span class="text-md lg:text-xl">Warning:</span> Are you sure you want to delete
                    <span class="font-bold text-blue-600">{{ props.customer.name }}</span>?
                </p>
                <div class="flex justify-end gap-4">
                    <Button @click="cancelDelete" :color="'gray'">Cancel</Button>
                    <Button @click="proceedDelete" :color="'danger'">OK</Button>
                </div>
            </div>
        </div>
    </div>
</template>
