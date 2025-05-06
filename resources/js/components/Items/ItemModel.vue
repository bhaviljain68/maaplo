<script setup>
import ToggleButton from '../ToggleButton.vue';
import Colors from './Colors.vue';
import DesignDetails from './DesignDetails.vue';
import ItemType from './ItemType.vue';
import Measurements from './Measurements.vue';
import Notes from './Notes.vue';
import WorkType from './WorkType.vue';
import Date from '../Date.vue';
import ClothImage from './ClothImage.vue';
import PatternImage from './PatternImage.vue';
import Button from '../Button.vue';
import { ref, defineProps, defineEmits } from 'vue';
const notes = ref('');
const props = defineProps(['showModal']);
const emit = defineEmits(['close', 'handleAddItem']);

// Form state
const form = ref({
    workType: '',
    itemType: '',
    deliveryDate: ''
});

// Save and emit
function saveItem() {
    emit('handleAddItem', form.value);
    emit('close');
}
</script>

<template>

    <div v-if="showModal">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black/50 z-40" @click.self="$emit('close')"></div>

        <!-- Modal Container -->
        <div class="fixed z-50 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 
               w-full lg:max-w-6xl 
       max-w-[calc(100%-2.5rem)] bg-white shadow-lg rounded-[10px] overflow-hidden">
            <!-- Close Button -->
            <div class="lg:pl-6 px-6 py-6 lg:pr-10 overflow-y-auto max-h-[80vh]">
                <Button @click="$emit('close')" color="gray" padding="sm" rounded="full" textSize="xl"
                    class="absolute lg:right-4 right-1 top-4">
                    &times;
                </Button>
                <h1 class="font-medium text-2xl mb-5">Add Items</h1>
                <!-- Scrollable Content -->
                <div class=" max-h-[75vh] pr-2 space-y-5">
                    <WorkType v-model="form.workType" />
                    <ItemType v-model="form.itemType" />
                    <Measurements />
                    <DesignDetails />

                    <div class="flex flex-col">
                        <Colors />
                        <Notes class="mt-5" v-model:notes="notes" />
                    </div>

                    <div class="flex items-center gap-4">
                        <h1 class="text-[16px] font-normal font-lato">Reference dress given?</h1>
                        <ToggleButton />
                    </div>

                    <Date v-model="form.deliveryDate" />

                    <div class="flex items-center gap-4">
                        <h1 class="text-[16px] font-normal font-lato">Mark as Urgent</h1>
                        <ToggleButton />
                    </div>

                    <div class="flex flex-col lg:flex-row justify-between gap-4">
                        <ClothImage />
                        <PatternImage />
                    </div>
                    <div class="">
                        <Button @click="saveItem" color="primary" textSize="lg" class="mb-5 w-full">
                            Save
                        </Button>
                    </div>

                </div>
            </div>
        </div>
    </div>

</template>
