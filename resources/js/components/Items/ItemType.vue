<script setup>
import { ref } from 'vue';
import { Icon } from '@iconify/vue';
import Input from '../InputWithLabel.vue';
import SearchSelect from '../SearchSelect.vue';
const showDropdownItemType = ref(false);
const modelValue = defineModel();
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
            <SearchSelect v-model="modelValue" />
            <!-- <ul class="text-md text-black dark:text-black" aria-labelledby="dropdownTrigger">
                <li>
                    <div class="flex flex-col ml-2  gap-3 text-black mt-2">
                        <div class="flex gap-2">
                            <Input type="radio" id="Kurta" radioValue="Kurta" label="Kurta" v-model="modelValue" name="Item-type" width="sm"/>
                            
                        </div>
                        <div class="flex gap-2">
                            <Input type="radio" id="Shirt" radioValue="Shirt" label="Shirt"   v-model="modelValue" name="Item-type" value="Shirt" width="sm"/>
                        </div>
                        <div class="flex gap-2">
                            <Input type="radio" id="Kurti" radioValue="Kurti" label="Kurti"  v-model="modelValue" name="Item-type" value="Kurti" width="sm"/>
                            
                        </div>
                        <div class="flex gap-2">
                            <Input type="radio" id="Pajama" radioValue="Pajama" label="Pajama"  v-model="modelValue" name="Item-type" value="Pajama" width="sm"/>
                            
                        </div>
                    </div>
                </li>
            </ul> -->
        </div>
    </div>
</template>