<script setup>
import { ref, computed, watch } from 'vue';
import { Icon } from '@iconify/vue';

const modelValue = defineModel();
const showDropdown = ref(false);
const searchQuery = ref('');

const options = ['Kurta', 'Shirt', 'Kurti', 'Pajama'];

const filteredOptions = computed(() => {
  if (searchQuery.value.length < 3) return [];
  return options.filter(opt =>
    opt.toLowerCase().includes(searchQuery.value.toLowerCase())
  );
});

const isInvalid = computed(() => {
  return (
    searchQuery.value.length >= 3 &&
    !options.includes(searchQuery.value)
  );
});

function selectOption(option) {
  modelValue.value = option;
  searchQuery.value = option;
  showDropdown.value = false;
}

watch(modelValue, (val) => {
  searchQuery.value = val;
});
</script>

<template>
  <div class="relative w-full max-w-sm mt-5">
    
    <div class="relative">
      <input
        type="text"
        v-model="searchQuery"
        @focus="showDropdown = true"
        placeholder="Search Item Type"
        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
        :class="{ 'border-red-500': isInvalid }"
      />

      <Icon
        icon="icon-park-outline:down"
        width="20"
        height="20"
        class="absolute top-2.5 right-3 text-gray-500 pointer-events-none"
      />

      <!-- Dropdown -->
      <ul
        v-if="showDropdown && filteredOptions.length"
        class="absolute z-10 mt-1 w-full bg-white border rounded shadow max-h-40 overflow-auto"
      >
        <li
          v-for="option in filteredOptions"
          :key="option"
          @click="selectOption(option)"
          class="px-4 py-2 cursor-pointer hover:bg-gray-100"
        >
          {{ option }}
        
        </li>
      </ul>
      

      <p v-if="isInvalid" class="text-sm text-red-600 mt-1">Invalid Search</p>
    </div>
  </div>
</template>
