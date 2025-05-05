<script setup>
import { ref } from 'vue';
import { Icon } from '@iconify/vue';
import Input from '../InputWithLabel.vue';

const modelValue = defineModel(); // enables v-model binding
const showDropdownWorkType = ref(false);

function toggleDropdownWorkType() {
    showDropdownWorkType.value = !showDropdownWorkType.value;
}
</script>

<template>
  <div>
    <div @click="toggleDropdownWorkType" class="flex cursor-pointer">
      <h1 class="font-normal text-md font-lato">Work Type</h1>
      <Icon
        :icon="showDropdownWorkType ? 'icon-park-outline:up' : 'icon-park-outline:down'"
        width="20" height="20" class="text-black ml-2"
      />
    </div>

    <div v-show="showDropdownWorkType" class="z-10 mt-2">
      <ul class="text-md text-black">
        <li>
          <div class="flex flex-col ml-2 gap-3 text-black mt-2">
            <div class="flex gap-2">
              <Input
                type="radio" id="new-from-material" name="work-type"
                radioValue="new-from-material"
                v-model="modelValue"
                label="New from Material"
              />
              
            </div>
            <div class="flex gap-2">
              <Input
                type="radio" id="only-stitching" name="work-type"
                radioValue="only-stitching"
                v-model="modelValue"
                label="Only Stitching"
              />
             
            </div>
            <div class="flex gap-2">
              <Input
                type="radio" id="only-altering" name="work-type"
                radioValue="only-altering"
                v-model="modelValue"
                label="Only Altering"
              />
             
            </div>
          </div>
        </li>
      </ul>

      <!-- Conditional inputs -->
      <div v-if="modelValue === 'new-from-material'" class="mt-4 ml-2 flex flex-col gap-3">
        <Input type="text" label="Material Code:" placeholder="Enter material code" />
        <Input type="number" label="Material Cost:" placeholder="Enter material cost" />
        <Input type="text" label="Material Type:" placeholder="Enter material type" />
        <Input type="number" label="Stitching Cost:" placeholder="Enter stitching cost" />
      </div>

      <div v-if="modelValue === 'only-stitching'" class="mt-4 ml-2">
        <Input type="text" label="Cost:" placeholder="Enter Cost" />
      </div>

      <div v-if="modelValue === 'only-altering'" class="mt-4 ml-2">
        <Input type="text" label="Cost:" placeholder="Enter Cost" />
      </div>
    </div>
  </div>
</template>
