<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { router } from '@inertiajs/vue3';

import { ref } from 'vue';
import Input from '@/components/InputWithLabel.vue';
import SearchSelect from '@/components/SearchSelect.vue';
import Button from '@/components/Button.vue';
const toast = new ToastMagic();
const gender = ref('');
const bodyPart = ref('');
const templateName = ref(''); // <-- You were missing this
const selectedMeasurements = ref([]);
const customTemplate = ref(false);
const loading = ref(false);
const measurements = [
    'Length', 'Arms', 'Back Neck', 'Waist', 'Sleeve Circle',
    'Chest', 'Sleeve Length', 'Shoulder', 'Seat', 'Front Neck'
];

const toggleMeasurement = (label) => {
    const index = selectedMeasurements.value.indexOf(label);
    if (index > -1) {
        selectedMeasurements.value.splice(index, 1);
    } else {
        selectedMeasurements.value.push(label);
    }
};
const submitForm = () => {
    // const router = useRouter();

    router.post('/items', {
        name: templateName.value,
        gender: gender.value === 'Male' ? 'm' : 'f',
        required_measurements: selectedMeasurements.value,
        body_part: bodyPart.value,
        custom_template: customTemplate.value,
    }, {
        onSuccess: () => {
            toast.success("Template created successfully!");
            // router.push('/items');
        },
        onError: (errors) => {
            toast.error("Failed to create template. Please fill in all the required fields.");
            console.error(errors);
        },
    });
};

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
                    <Input v-model="templateName" label="Template Name" modelValue="" placeholder="Enter Template Name"
                        margin="md" width="full" fonttype="normal" textSize="base" rounded="md" error="" />
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
                    <h1 class="mb-2 text-md mt-2">Required Measurements :</h1>
                    <div class="grid grid-cols-2 gap-4">
                        <div v-for="measurement in measurements" :key="measurement">
                            <Input type="checkbox" :label="measurement"
                                :modelValue="selectedMeasurements.includes(measurement)"
                                @update:modelValue="toggleMeasurement(measurement)" width="sm" error="" />
                        </div>
                    </div>

                </div>

                <Button @click="submitForm" color="primary" textSize="lg" padding="md" rounded="full">
                    Save
                </Button>

            </div>

        </div>
    </AppLayout>
</template>
