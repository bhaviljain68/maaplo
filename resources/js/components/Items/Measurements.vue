<script setup lang="ts">
import { ref, watch, computed } from 'vue';
import { Icon } from '@iconify/vue';
import SvgIcon from '../SvgIcon.vue';
import Input from '../InputWithLabel.vue';

const props = defineProps<{
    measurements: Record<string, string> | null;
}>();

const emit = defineEmits<{
    (e: 'update:measurements', value: Record<string, string>): void;
}>();

const measurements = ref<Record<string, string>>({});
if (props.measurements) {
    measurements.value = { ...props.measurements };
}

watch(measurements, (val) => {
    emit('update:measurements', val);
}, { deep: true });

const showDropdownMeasurements = ref(false);

const measurementErrors = computed(() => {
    const errors: Record<string, string> = {};
    for (const key in measurements.value) {
        const val = measurements.value[key];

        // Skip empty fields
        if (!val) continue;

        // Allow numbers with optional one decimal point, like 123 or 123.45
        if (!/^\d{1,3}(\.\d{1,2})?$/.test(val)) {
            errors[key] = 'Only Numbers, Max 3 Digits (e.g. 123 or 123.45)';
        }
    }
    return errors;
});


function toggleDropdownMeasurements() {
    showDropdownMeasurements.value = !showDropdownMeasurements.value;
}
</script>
<template>
    <div class="mt-5">
        <div @click="toggleDropdownMeasurements()" class="flex">
            <h1 class="font-normal text-md leading-4 tracking-normal font-lato">Measurements
            </h1>
            <Icon v-if="showDropdownMeasurements == false" icon="icon-park-outline:down" width="20" height="20"
                class="text-black ml-2" />
            <Icon v-if="showDropdownMeasurements == true" icon="icon-park-outline:up" width="20" height="20"
                class="text-black ml-2" />
        </div>
        <!-- Dropdown -->
        <div v-show="showDropdownMeasurements" class="z-10">
            <ul class="text-md text-black dark:text-black" aria-labelledby="dropdownTrigger">
                <li>
                    <div class="grid grid-col-1 lg:grid-cols-2 gap-x-4 gap-y-4 ml-2 mt-4 text-black font-lato text-sm">
                        <!-- Length -->
                        <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                            <SvgIcon :name="'length'" />
                            <span
                                class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Length</span>
                            <Input v-model="measurements.length" type="text" width="md" color="grayBorder" padding="sm"
                                rounded="sm" :error="measurementErrors.length" />
                        </div>

                        <!-- Chest -->
                        <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                            <SvgIcon :name="'chest'" />
                            <span
                                class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Chest</span>
                            <Input v-model="measurements.chest" type="text" width="md" color="grayBorder" padding="sm"
                                rounded="sm" :error="measurementErrors.chest" />
                        </div>

                        <!-- Arms -->
                        <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                            <SvgIcon :name="'Arms'" />
                            <span
                                class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Arms</span>
                            <Input v-model="measurements.arms" type="text" width="md" color="grayBorder" padding="sm"
                                rounded="sm" :error="measurementErrors.arms" />
                        </div>

                        <!-- Sleeve length -->
                        <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                            <SvgIcon :name="'sleeve-length'" />
                            <span
                                class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Sleeve
                                length</span>
                            <Input v-model="measurements.sleeve_length" type="text" width="md" color="grayBorder"
                                padding="sm" rounded="sm" :error="measurementErrors.sleeve_length" />
                        </div>

                        <!-- Back Neck -->
                        <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                            <SvgIcon :name="'back-neck'" />
                            <span
                                class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Back
                                Neck</span>
                            <Input v-model="measurements.back_neck" type="text" width="md" color="grayBorder"
                                padding="sm" rounded="sm" :error="measurementErrors.back_neck" />
                        </div>

                        <!-- Shoulder -->
                        <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                            <SvgIcon :name="'shoulder'" />
                            <span
                                class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Shoulder</span>
                            <Input v-model="measurements.shoulder" type="text" width="md" color="grayBorder"
                                padding="sm" rounded="sm" :error="measurementErrors.shoulder" />
                        </div>

                        <!-- Waist -->
                        <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                            <SvgIcon :name="'waist'" />
                            <span
                                class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Waist</span>
                            <Input v-model="measurements.waist" type="text" width="md" color="grayBorder" padding="sm"
                                rounded="sm" :error="measurementErrors.waist" />
                        </div>

                        <!-- Seat -->
                        <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                            <SvgIcon :name="'seat'" />
                            <span
                                class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Seat</span>
                            <Input v-model="measurements.seat" type="text" width="md" color="grayBorder" padding="sm"
                                rounded="sm" :error="measurementErrors.seat" />
                        </div>

                        <!-- Sleeve Circle -->
                        <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                            <SvgIcon :name="'sleeve-circle'" />
                            <span
                                class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Sleeve
                                Circle</span>
                            <Input v-model="measurements.sleeve_circle" type="text" width="md" color="grayBorder"
                                padding="sm" rounded="sm" :error="measurementErrors.sleeve_circle" />
                        </div>

                        <!-- Front Neck -->
                        <div class="flex items-center gap-4 col-span-2 sm:col-span-1">
                            <SvgIcon :name="'front-neck'" />
                            <span
                                class="w-32 font-normal text-[16px] leading-[8px] tracking-normal font-lato font-normal text-[16px] leading-[8px] tracking-normal font-lato">Front
                                Neck</span>
                            <Input v-model="measurements.front_neck" type="text" width="md" color="grayBorder"
                                padding="sm" rounded="sm" :error="measurementErrors.front_neck" />
                        </div>
                    </div>

                </li>
            </ul>
        </div>
    </div>
</template>
