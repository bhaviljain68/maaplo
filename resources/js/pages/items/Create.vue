<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { ref } from 'vue';
import { Icon } from '@iconify/vue';
import Input from '@/components/InputWithLabel.vue';
import SearchSelect from '@/components/SearchSelect.vue';
import Button from '@/components/Button.vue';
const gender = ref('');
const bodyPart = ref('');
</script>


<template>
    <AppLayout>
        <div class="px-4 py-8 max-w-6xl mx-auto">
            <div>
                <h1 class="text-[24px] leading-[16px] font-bold tracking-[0] text-gray-800 font-[Convergence]">
                    Add New Template
                </h1>
            </div>
            <div class="flex flex-col lg:mt-5 gap-3 mt-10 lg:gap-4 rounded-lg lg:border lg:border-primary p-0 lg:p-4">
                <!-- <h1>Select Base Template</h1> -->
                <div>
                    <label class="text-md">Select Base Template</label>
                    <SearchSelect class="mt-2" />
                </div>
                <div>
                    <Input label="Template Name" modelValue="" placeholder="Enter Template Name" margin="md"
                        width="full" fonttype="normal" textSize="base" rounded="md" error="" />
                </div>
                <div class="mt-2 lg:mt-4 flex flex-row gap-2 gap-4">
                    <div>
                        <h1 class="lg:mb-2 text-md">Gender:</h1>
                    </div>
                    <div class="flex gap-4">
                        <label>
                            <input type="radio" name="gender" value="Female" v-model="gender" class="hidden" />
                            <div :class="[
                                'px-4 py-1 rounded border text-sm cursor-pointer',
                                gender === 'Female'
                                    ? 'bg-primary text-white'
                                    : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-100'
                            ]">
                                Female
                            </div>
                        </label>

                        <label>
                            <input type="radio" name="gender" value="Male" v-model="gender" class="hidden" />
                            <div :class="[
                                'px-4 py-1 rounded border text-sm cursor-pointer',
                                gender === 'Male'
                                    ? 'bg-primary text-white'
                                    : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-100'
                            ]">
                                Male
                            </div>
                        </label>
                    </div>
                </div>

                <div class="mt-2 lg:mt-4 flex flex-row gap-2 gap-4">
                    <div>
                        <h1 class="lg:mb-2 text-md">Body Part:</h1>
                    </div>
                    <div class="flex gap-4">
                        <label>
                            <input type="radio" name="bodyPart" value="Upper" v-model="bodyPart" class="hidden" />
                            <div :class="[
                                'px-4 py-1 rounded border text-sm cursor-pointer',
                                bodyPart === 'Upper'
                                    ? 'bg-primary text-white'
                                    : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-100'
                            ]">
                                Upper
                            </div>
                        </label>

                        <label>
                            <input type="radio" name="bodyPart" value="Lower" v-model="bodyPart" class="hidden" />
                            <div :class="[
                                'px-4 py-1 rounded border text-sm cursor-pointer',
                                bodyPart === 'Lower'
                                    ? 'bg-primary text-white'
                                    : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-100'
                            ]">
                                Lower
                            </div>
                        </label>


                    </div>
                </div>

                <div class="mb-5">
                    <h1 class="mb-2 font-semibold text-md mt-2">Required Measurements :</h1>
                    <div class="grid grid-cols-2 gap-4">
                        <Input type="checkbox" label="Length" modelValue="" width="sm" error="" />
                        <Input type="checkbox" label="Arms" modelValue="" width="sm" error="" />
                        <Input type="checkbox" label="Back Neck" modelValue="" width="sm" error="" />
                        <Input type="checkbox" label="Waist" modelValue="" width="sm" error="" />
                        <Input type="checkbox" label="Sleeve Circle" modelValue="" width="sm" error="" />
                        <Input type="checkbox" label="Chest" modelValue="" width="sm" error="" />
                        <Input type="checkbox" label="Sleeve Length" modelValue="" width="sm" error="" />
                        <Input type="checkbox" label="Shoulder" modelValue="" width="sm" error="" />
                        <Input type="checkbox" label="Seat" modelValue="" width="sm" error="" />
                        <Input type="checkbox" label="Front Neck" modelValue="" width="sm" error="" />
                    </div>
                </div>

                <Button color="primary" textSize="lg" padding="md" rounded="full">
                    Save
                </Button>

            </div>

        </div>
    </AppLayout>
</template>