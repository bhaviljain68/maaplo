<script setup>
import { ref } from 'vue'
import { Icon } from '@iconify/vue';

// Separate refs for each image and input
const previewImage1 = ref(null)
const previewImage2 = ref(null)
const fileInput1 = ref(null)
const fileInput2 = ref(null)

// Trigger function for each input
function triggerFileInput(index) {
    if (index === 1) fileInput1.value.click()
    else if (index === 2) fileInput2.value.click()
}

// Change handler for each file input
function onFileChange(event, index) {
    const file = event.target.files[0]
    if (file && file.type.startsWith('image/')) {
        const url = URL.createObjectURL(file)
        if (index === 1) previewImage1.value = url
        else if (index === 2) previewImage2.value = url
    }
}
</script>

<template>
    <div class="mt-5 lg:w-96">
      <h1 class="font-normal text-[16px] leading-4 tracking-normal font-lato">Pattern Images</h1>
      <div class="flex gap-10">
        
        <!-- Cloth 1 -->
        <div class="w-40 mt-5 h-full rounded-md gap-[10px] p-2 shadow-[0px_0px_6.1px_0px_#00000040]">
          <div class="flex items-center justify-between mb-2">
            <h1 class="font-normal text-[14px] leading-[8px] tracking-[0%] text-[#8C8C8C] font-lato block">Pattern 1</h1>
            <button @click="triggerFileInput(1)" class="flex justify-center cursor-pointer border border-gray-400 rounded-full">
              <Icon icon="material-symbols:add-rounded" width="14" height="14" />
            </button>
          </div>
          <div class="mb-2">
            <div class="bg-[#BDDBDB3D] p-2 rounded h-24">
              <img v-if="previewImage1" :src="previewImage1" alt="Preview"
                class="w-32 h-20 object-cover rounded" />
            </div>
            <input ref="fileInput1" type="file" class="hidden" @change="e => onFileChange(e, 1)" accept="image/*" />
          </div>
        </div>
  
        <!-- Cloth 2 -->
        <div class="w-40 mt-5 h-full rounded-md gap-[10px] p-2 shadow-[0px_0px_6.1px_0px_#00000040]">
          <div class="flex items-center justify-between mb-2">
            <h1 class="font-normal text-[14px] leading-[8px] tracking-[0%] text-[#8C8C8C] font-lato block">Pattern 2</h1>
            <button @click="triggerFileInput(2)" class="flex justify-center cursor-pointer border border-gray-400 rounded-full">
              <Icon icon="material-symbols:add-rounded" width="14" height="14" />
            </button>
          </div>
          <div class="mb-2">
            <div class="bg-[#BDDBDB3D] p-2 rounded h-24">
              <img v-if="previewImage2" :src="previewImage2" alt="Preview"
                class="w-32 h-20 object-cover rounded" />
            </div>
            <input ref="fileInput2" type="file" class="hidden" @change="e => onFileChange(e, 2)" accept="image/*" />
          </div>
        </div>
  
      </div>
    </div>
  </template>
  