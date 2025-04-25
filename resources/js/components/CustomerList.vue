<script setup>
import { Icon } from '@iconify/vue';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

// JavaScript-style props
const props = defineProps({
    customer: {
        type: Object,
        required: true
    }
});
const showDropdown = ref(false);
function toggleDropdown() {
    showDropdown.value = !showDropdown.value;
}
</script>



<template>
    <div class="gap-[10px] mt-5 h-full rounded-[10px] px-[10px] py-[17px] bg-[#DEEFF4]">
        <!-- Trigger -->
        <div>
            <h1 class="font-[Lato] font-medium text-[18px] leading-[16px] tracking-[0] text-black p-2">
                {{ props.customer.name }} </h1>
        </div>

        <div @click="toggleDropdown()">
            <div class="flex">
                <h1
                    class="font-[Lato] font-medium text-[18px] leading-[16px] tracking-[0] text-black p-2 cursor-pointer">
                    Contact
                </h1>
                <Icon v-if="showDropdown == false" icon="icon-park-outline:down" width="20" height="20"
                    class="mt-[5px]" />
                <Icon v-if="showDropdown == true" icon="icon-park-outline:up" width="20" height="20" class="mt-[5px]" />
            </div>
        </div>

        <!-- Dropdown -->
        <div v-show="showDropdown" class="mt-2 z-10">
            <ul class="text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownTrigger">

                <li>
                    <div class="flex flex-row ml-2">
                        <Icon icon="ic:baseline-phone" width="16" height="16" class="mr-1" />
                        <a href="#" class="text-black">
                            {{ props.customer.phone }}</a>
                    </div>
                </li>

                <li>
                    <div class="flex flex-row ml-2 py-2">
                        <Icon icon="ic:outline-email" width="18" height="18" class="mr-1" />
                        <a href="#" class="block text-black">{{ props.customer.email }}</a>
                    </div>
                </li>
                <li>
                    <div class="flex flex-row ml-1">
                        <Icon icon="mdi:location" width="24" height="24" class="mr-1" />
                        <a href="#" class="block text-black">{{ props.customer.address }}</a>
                    </div>
                </li>

            </ul>
        </div>
        <div>
            <h1 class="font-[Lato] font-medium text-[18px] leading-[16px] tracking-[0] text-black p-2">Active Order:
                {{ props.customer.active_orders }}
            </h1>
        </div>
        <div>
            <h1 v-if="props.customer.payment_due" class="font-[Lato] font-medium text-[18px] leading-[16px] tracking-[0] text-black p-2">Payment Due:
                ₹ {{ props.customer.payment_due }}
            </h1>
            <h1 v-else class="font-[Lato] font-medium text-[18px] leading-[16px] tracking-[0] text-black p-2">Payment Due:
                ₹ 0.00
            </h1>
            
        </div>
        <div>
            <h1 class="font-[Lato] font-medium text-[18px] leading-[16px] tracking-[0] text-black p-2">Total
                Payment: ₹
                {{ }}</h1>
        </div>
        <div class="flex justify-end gap-3">
            <Link :href="route('customers.edit',customer.id)">
            <Icon icon="ri:edit-fill" width="18" height="18" class="text-[#005FAF]" />
            </Link>
            <Link>
            <Icon icon="ic:baseline-delete" width="18" height="18" class="text-[#E73939]" />
            </Link>
        </div>
    </div>
</template>
