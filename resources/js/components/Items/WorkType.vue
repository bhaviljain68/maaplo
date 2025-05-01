<script setup>
import { ref } from 'vue';
import { Icon } from '@iconify/vue';
const showDropdownWorkType = ref(false);
function toggleDropdownWorkType() {
    showDropdownWorkType.value = !showDropdownWorkType.value;
}
</script>
<template>
    <!-- work type -->
    <div>
        <div @click="toggleDropdownWorkType()" class="flex">
            <h1 class="font-normal text-md leading-4 tracking-normal font-lato">Work Type</h1>
            <Icon v-if="showDropdownWorkType == false" icon="icon-park-outline:down" width="20" height="20"
                class="text-black ml-2" />
            <Icon v-if="showDropdownWorkType == true" icon="icon-park-outline:up" width="20" height="20"
                class="text-black ml-2" />
        </div>
        <!-- Dropdown -->
        <div v-show="showDropdownWorkType" class="z-10" v-debounce:400ms="myFn">
            <ul class="text-md text-black dark:text-black" aria-labelledby="dropdownTrigger">
                <li>
                    <div class="flex flex-col ml-2 gap-3 text-black mt-2">
                        <div class="flex gap-2">
                            <input type="radio" id="new-from-material" name="new-from-material" value="new-from-material" class="w-4">
                            <h1 class="font-normal text-sm leading-4 tracking-normal font-lato">
                                New
                                from Material
                            </h1>
                        </div>
                        <div class="flex gap-2">
                            <input type="radio" id="nonly-stitching" name="nonly-stitching" value="nonly-stitching" class="w-4">
                            <h1 class="font-normal text-sm leading-4 tracking-normal font-lato">
                                Only
                                Stitching</h1>
                        </div>
                        <div class="flex gap-2">
                            <input type="radio" id="only-altering" name="only-altering" value="only-altering" class="w-4">
                            <h1 class="font-normal text-sm leading-4 tracking-normal font-lato">
                                Only
                                Altering</h1>
                        </div>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>