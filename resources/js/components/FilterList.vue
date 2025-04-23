<script setup>
import { Icon } from '@iconify/vue';
import { ref } from 'vue';
const showFilter = ref(false);
const showDropdown = ref(false);
const showDropdownDelivery = ref(false);

const props = defineProps({
    showable: {
        type: Object,
        default: () => ({ showSearch: false, showFilter: false })
    }
});
const emit = defineEmits(['hideOrShow']);

function toggleDropdown() {
    showDropdown.value = !showDropdown.value;
}
function toggleDropdownDelivery() {
    showDropdownDelivery.value = !showDropdownDelivery.value;
}

</script>
<template>
    <div class="mx-auto max-w-7xl w-full">
        <div>
            <Icon icon="rivet-icons:filter" width="20" height="20" class="mt-2" @click="emit('hideOrShow', 'filter')" />
        </div>

        <div v-if="showable.showFilter" class="transition-all mt-10" :style="{
            marginBottom: showDropdown && showDropdownDelivery
                ? '24rem'
                : showDropdown || showDropdownDelivery
                    ? '18rem'
                    : '8rem'
        }">

            <div
                class="flex flex-col gap-4 fixed bg-white lg:w-full w-96 mx-4 absolute left-0 lg:left-[120px] lg:max-w-6xl rounded-md px-4 py-3 text-sm shadow-[0px_0px_8.6px_0px_#005FAF40] focus:outline-none focus:ring focus:border-gray-400 transition-all">
                <h1 class="font-[Lato] font-medium text-[18px] leading-[16px] tracking-[0] text-black">Filter</h1>
                <!-- order status dropdown -->
                <div @click="toggleDropdown()">
                    <div class="flex gap-2">
                        <h1 class="font-[Lato] font-medium text-[18px] leading-[16px] tracking-[0] text-black">Order
                            Status
                        </h1>
                        <Icon v-if="showDropdown == false" icon="icon-park-outline:down" width="20" height="20"
                            class="text-black" />
                        <Icon v-if="showDropdown == true" icon="icon-park-outline:up" width="20" height="20"
                            class="text-black" />
                    </div>
                </div>
                <!-- Dropdown -->
                <div v-show="showDropdown" class="z-10">
                    <ul class="text-md text-black dark:text-black" aria-labelledby="dropdownTrigger">
                        <li>
                            <div class="flex flex-col ml-2 gap-1 text-black ml-2">
                                <div>
                                    <input type="radio" id="create" name="status" value="Create">
                                    <label for="create" class="ml-2">Create</label><br>
                                </div>
                                <div>
                                    <input type="radio" id="in-progress" name="status" value="In Progress" checked
                                        class="accent-[#167893]">
                                    <label for="in-progress" class="ml-2 text-[#167893]">In Progress</label><br>
                                </div>
                                <div>
                                    <input type="radio" id="trial-done" name="status" value="Trial Done">
                                    <label for="trial-done" class="ml-2">Trial Done</label><br>
                                </div>
                                <div>
                                    <input type="radio" id="in-alteration" name="status" value="In Alteration">
                                    <label for="in-alteration" class="ml-2">In Alteration</label><br>
                                </div>
                                <div>
                                    <input type="radio" id="ready-for-delivery" name="status"
                                        value="Ready for Delivery">
                                    <label for="ready-for-delivery" class="ml-2">Ready for Delivery</label><br>
                                </div>
                                <div>
                                    <input type="radio" id="delivered" name="status" value="Delivered">
                                    <label for="delivered" class="ml-2">Delivered</label><br>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Delivery Date -->
                <div @click="toggleDropdownDelivery()">
                    <div class="flex gap-2">
                        <h1 class="font-[Lato] font-medium text-[18px] leading-[16px] tracking-[0] text-black">Delivery
                            Date
                        </h1>
                        <Icon v-if="showDropdownDelivery == false" icon="icon-park-outline:down" width="20" height="20"
                            class="text-black" />
                        <Icon v-if="showDropdownDelivery == true" icon="icon-park-outline:up" width="20" height="20"
                            class="text-black" />
                    </div>
                </div>
                <!-- Dropdown -->
                <div v-show="showDropdownDelivery" class="z-10">
                    <ul class="text-md text-black dark:text-black" aria-labelledby="dropdownTrigger">
                        <li>
                            <div class="flex flex-col ml-2 gap-1 text-black ml-2">
                                <div>
                                    <input type="radio" id="Within-7-Days" name="status" value="Within 7 Days"
                                        class="accent-[#167893]" checked>
                                    <label for="Within-7-Days" class="ml-2 text-[#167893]">Within 7 Days</label><br>
                                </div>
                                <div>
                                    <input type="radio" id="7-15-Days" name="status" value="7-15 Days">
                                    <label for="7-15-Days" class="ml-2">7-15 Days</label><br>
                                </div>
                                <div>
                                    <input type="radio" id="Overdue" name="status" value="Overdue">
                                    <label for="Overdue" class="ml-2">Overdue</label><br>
                                </div>
                                <div>
                                    <input type="radio" id="One-Month" name="status" value="One Month">
                                    <label for="One-Month" class="ml-2">One Month</label><br>
                                </div>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

</template>