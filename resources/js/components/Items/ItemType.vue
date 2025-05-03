<script setup>
import { ref } from 'vue';
import { Icon } from '@iconify/vue';
import Input from '../InputWithLabel.vue';
const showDropdownItemType = ref(false);
function toggleDropdownItemType() {
    showDropdownItemType.value = !showDropdownItemType.value;
}
</script>
<template>
    <div class="mt-5">
        <div @click="toggleDropdownItemType()" class="flex">
            <h1 class="font-normal text-md leading-4 tracking-normal font-lato">Item Type</h1>
            <Icon v-if="showDropdownItemType == false" icon="icon-park-outline:down" width="20" height="20"
                class="text-black ml-2" />
            <Icon v-if="showDropdownItemType == true" icon="icon-park-outline:up" width="20" height="20"
                class="text-black ml-2" />
        </div>
        <!-- Dropdown -->
        <div v-show="showDropdownItemType" class="z-10">
            <ul class="text-md text-black dark:text-black" aria-labelledby="dropdownTrigger">
                <li>
                    <div class="flex flex-col ml-2  gap-3 text-black mt-2">
                        <div class="flex gap-2">
                            <Input type="radio" id="Kurta" name="Item-type" value="Kurta" width="sm"/>
                            <h1 class="font-normal text-sm leading-4 tracking-normal font-lato">
                                Kurta
                            </h1>
                        </div>
                        <div class="flex gap-2">
                            <Input type="radio" id="Shirt" name="Item-type" value="Shirt" width="sm"/>
                            <h1 class="font-normal text-sm leading-4 tracking-normal font-lato">
                                Shirt</h1>

                        </div>
                        <div class="flex gap-2">
                            <Input type="radio" id="Kurti" name="Item-type" value="Kurti" width="sm"/>
                            <h1 class="font-normal text-sm leading-4 tracking-normal font-lato">
                                Kurti</h1>
                        </div>
                        <div class="flex gap-2">
                            <Input type="radio" id="Pajama" name="Item-type" value="Pajama" width="sm"/>
                            <h1 class="font-normal text-sm leading-4 tracking-normal font-lato">
                                Pajama</h1>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>