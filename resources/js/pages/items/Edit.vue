<script setup>
import { ref } from 'vue';
import { usePage, router } from '@inertiajs/vue3'; // Use Inertia to handle page data
import Button from '@/components/Button.vue';
import AppLayout from '@/layouts/AppLayout.vue';

// Fetch the current item data from Inertia
const { item } = usePage().props;

// Setup form state with initial values from `item`
const form = ref({
  name: item.name,
  gender: item.gender,
  body_part: item.body_part,
  required_measurements: JSON.parse(item.required_measurements)
});

// Handle form submission to update the item
const handleSubmit = () => {
  router.put(route('items.update', item.id), form.value, {
    onSuccess: () => {
      router.push(route('items.index')); // Redirect to the item list page after success
    },
    onError: () => {
      console.error('There was an error updating the item.');
    }
  });
};
</script>

<template>
  <AppLayout>
    <div class="lg:mx-auto max-w-7xl py-8 px-4">
      <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Item Template</h1>

      <!-- Edit Form -->
      <div @submit.prevent="handleSubmit" class="space-y-6">

        <!-- Item Name -->
        <div class="flex flex-col">
          <label for="name" class="font-semibold text-lg">Item Name</label>
          <input
            v-model="form.name"
            type="text"
            id="name"
            class="mt-2 p-2 border rounded-md"
            placeholder="Enter item name"
            required
          />
        </div>

        <!-- Gender -->
        <div class="flex flex-col">
          <label for="gender" class="font-semibold text-lg">Gender</label>
          <select
            v-model="form.gender"
            id="gender"
            class="mt-2 p-2 border rounded-md"
            required
          >
            <option value="m">Male</option>
            <option value="f">Female</option>
            <option value="o">Other</option>
          </select>
        </div>

        <!-- Body Part -->
        <div class="flex flex-col">
          <label for="body_part" class="font-semibold text-lg">Body Part</label>
          <select
            v-model="form.body_part"
            id="body_part"
            class="mt-2 p-2 border rounded-md"
            required
          >
            <option value="upper">Upper</option>
            <option value="lower">Lower</option>
          </select>
        </div>

        <!-- Required Measurements -->
        <div class="flex flex-col">
          <label for="required_measurements" class="font-semibold text-lg">Required Measurements</label>
          <textarea
            v-model="form.required_measurements"
            id="required_measurements"
            class="mt-2 p-2 border rounded-md"
            placeholder="Enter required measurements (JSON format)"
            rows="4"
            required
          ></textarea>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end gap-4 mt-4">
          <Button @click="handleSubmit" :color="'primary'">Save Changes</Button>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

