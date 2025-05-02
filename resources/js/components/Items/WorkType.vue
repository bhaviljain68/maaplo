<script setup>
import { ref } from 'vue';
import { Icon } from '@iconify/vue';
import Input from '../InputWithLabel.vue';
const showDropdownWorkType = ref(false);
const selectedWorkType = ref('');
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
        <div v-show="showDropdownWorkType" class="z-10">
            <ul class="text-md text-black dark:text-black" aria-labelledby="dropdownTrigger">
                <li>
                    <div class="flex flex-col ml-2 gap-3 text-black mt-2">
                        <div class="flex gap-2">
                            <Input type="radio" id="new-from-material" name="work-type" radioValue="new-from-material"
                                v-model="selectedWorkType" width="sm" />
                            <h1 class="font-normal text-sm leading-4 tracking-normal font-lato">
                                New
                                from Material
                            </h1>
                        </div>
                        <div class="flex gap-2">
                            <Input type="radio" id="only-stitching" name="work-type"
                                radioValue="only-stitching" v-model="selectedWorkType" width="sm" />

                            <h1 class="font-normal text-sm leading-4 tracking-normal font-lato">
                                Only
                                Stitching</h1>
                        </div>
                        <div class="flex gap-2">
                            <Input type="radio" id="only-altering" name="work-type"
                                radioValue="only-altering" v-model="selectedWorkType" width="sm" />

                            <h1 class="font-normal text-sm leading-4 tracking-normal font-lato">
                                Only
                                Altering</h1>
                        </div>
                    </div>
                </li>
            </ul>


            <!-- Conditional Input Fields -->
            <div v-if="selectedWorkType === 'new-from-material'" class="mt-4 ml-2 flex flex-col gap-4">
                <div>
                    <label class="block text-md font-medium text-gray-700">Material Code :</label>
                    <Input type="text" padding="md" margin="md" rounded="md"
                        textSize="base" width="full" placeholder="Enter material code" />
                </div>
                <div>
                    <label class="block text-md font-medium text-gray-700">Material Cost :</label>
                    <Input type="number" padding="md" margin="md" rounded="md" textSize="base"
                        width="full" placeholder="Enter material cost" />
                </div>
                <div>
                    <label class="block text-md font-medium text-gray-700">Material Type :</label>
                    <Input type="number" padding="md" margin="md" rounded="md" textSize="base"
                        width="full" placeholder="Enter material Type" />
                </div>
                <div>
                    <label class="block text-md font-medium text-gray-700">Stiching Cost :</label>
                    <Input type="number" padding="md" margin="md" rounded="md" textSize="base"
                        width="full" placeholder="Enter stitching cost" />
                </div>
            </div>

            <!-- Conditional Input Fields -->
            <div v-if="selectedWorkType === 'only-stitching'" class="mt-4 ml-2 flex flex-col gap-4">
                <div>
                    <label class="block text-md font-medium text-gray-700">Cost :</label>
                    <Input type="text" padding="md" margin="md" rounded="md" textSize="base"
                        width="full" placeholder="Enter Cost" />
                </div>
            </div>

            <!-- Conditional Input Fields -->
            <div v-if="selectedWorkType === 'only-altering'" class="mt-4 ml-2 flex flex-col gap-4">
                <div>
                    <label class="block text-md font-medium text-gray-700">Cost :</label>
                    <Input type="text" padding="md" margin="md" rounded="md" textSize="base"
                        width="full" placeholder="Enter Cost" />
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped></style>
