<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { Icon } from '@iconify/vue';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import Chart from '@/components/Chart.vue';

</script>

<template>

    <Head title="Costomer" />
    <AppLayout>
        <div class="p-8 max-w-6xl mx-auto">
            <h1 class="text-2xl font-bold mb-6">Enter Details</h1>

            <form class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Customer Name -->
                <div>
                    <label class="block font-semibold mb-1">Customer Name <span class="text-red-500">*</span></label>
                    <input type="text" placeholder="Enter Customer Name"
                        class="border-b border-gray-400 bg-transparent w-full focus:outline-none focus:border-black py-1" />
                </div>


                <!-- Contact Number -->
                <div>
                    <label class="block font-semibold mb-1">Contact Number <span class="text-red-500">*</span></label>
                    <input type="text" class="border-b border-gray-400 bg-transparent w-full focus:outline-none focus:border-black py-1" placeholder="Enter Phone Number" />
                </div>

                <!-- Email -->
                <div>
                    <label class="block font-semibold mb-1">Email (optional)</label>
                    <input type="email" class="border-b border-gray-400 bg-transparent w-full focus:outline-none focus:border-black py-1" placeholder="example@mail.com" />
                </div>

                <!-- Date of Birth -->
                <div>
                    <label class="block font-semibold">Date of Birth (optional)</label>
                    <input type="date" class="border-b border-gray-400 bg-transparent w-full focus:outline-none focus:border-black py-1" />
                </div>

                <!-- Address -->
                <div class="md:col-span-2">
                    <label class="block font-semibold">Address <span class="text-red-500">*</span></label>
                    <textarea class="border-b border-gray-400 bg-transparent w-full focus:outline-none focus:border-black py-1" rows="3" placeholder="Enter address here..."></textarea>
                </div>

                <!-- Gender -->
                <div>
                    <label class="block font-semibold mb-2">Gender <span class="text-red-500">*</span></label>
                    <div class="flex items-center space-x-6">
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="gender" value="Male" class="form-radio accent-black" />
                            <span>Male</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="gender" value="Female" class="form-radio accent-black" />
                            <span>Female</span>
                        </label>
                    </div>
                </div>

                <!-- Active Orders -->
                <div>
                    <label class="block font-semibold">Active Orders</label>
                    <input type="number" class="input" min="0" placeholder="0" />
                </div>

                <!-- Payment Due -->
                <div>
                    <label class="block font-semibold">Payment Due (₹)</label>
                    <input type="number" class="border-b border-gray-400 bg-transparent w-full focus:outline-none focus:border-black py-1" min="0" step="0.01" placeholder="0.00" />
                </div>

                <!-- Upload Section -->
                <div class="md:col-span-3 bg-white p-6 rounded-lg shadow-md border">
                    <h2 class="text-lg mb-4 font-bold">Photo <span class="text-red-500">*</span></h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Half Image Upload -->
                        <div>
                            <label class="block font-semibold mb-2">Half Image</label>
                            <label class="upload-box">
                                <img src="/images/half-coustomer.jpeg" alt="Half" class="w-6 h-6 mr-2" />
                                <span>Select Half Image</span>
                                <input type="file" class="hidden" />
                            </label>
                        </div>

                        <!-- Full Image Upload -->
                        <div>
                            <label class="block font-semibold mb-2">Full Image</label>
                            <label class="upload-box">
                                <img src="/images/full-coustomer.jpeg" alt="Full" class="w-6 h-6 mr-2" />
                                <span>Select Full Image</span>
                                <input type="file" class="hidden" />
                            </label>
                        </div>
                    </div>
                </div>


                <!-- Submit Button (Full Width Below) -->
                <div class="md:col-span-3">
                    <button type="button" class="btn  w-full bg-[#167893] mt-4">Save & Continue</button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>

<style scoped>
.input {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-top: 0.25rem;
    background-color: #fff;
}

.btn {
    padding: 0.75rem 1.2rem;
    background-color: #455a88;
    color: white;
    font-weight: 600;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}
</style>
