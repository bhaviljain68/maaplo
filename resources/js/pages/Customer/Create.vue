<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import { reactive } from 'vue';


const props = defineProps<{
    errors: Record<string, string>
}>();
const form = reactive({
    user_id: 1, // Replace with actual user ID
    name: '',
    gender: '',
    phone: '',
    email: '',
    address: '',
    notes: '', // Optional: Can be expanded
    dob: '',
    active_orders: 0,
    payment_due: 0.00,
    half_image: null,
    full_image: null,
});

const submitForm = () => {
    const payload = new FormData();

    payload.append('user_id', form.user_id.toString());
    payload.append('name', form.name);
    payload.append('phone', form.phone);
    payload.append('email', form.email);
    payload.append('gender', form.gender);
    payload.append('address', form.address);
    payload.append('dob', form.dob);
    payload.append('active_orders', form.active_orders.toString());
    payload.append('payment_due', form.payment_due.toString());

    if (form.half_image) payload.append('half_image', form.half_image);
    if (form.full_image) payload.append('full_image', form.full_image);

    router.post('/customers', payload);
};

const handleImageUpload = (event: Event, field: 'half_image' | 'full_image') => {
    const file = (event.target as HTMLInputElement).files?.[0];

    if (file && file.size > 2 * 1024 * 1024) { // 2 MB
        alert('Image must be less than 2MB.');
        return;
    }

    form[field] = file;
};


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
                    <input type="text" v-model="form.name" placeholder="Enter Customer Name"
                        class="border-b border-gray-400 bg-transparent w-full focus:outline-none focus:border-black py-1" />
                    <div v-if="errors.name" class="text-red-600 text-sm mt-1">{{ errors.name }}</div>
                </div>


                <!-- Contact Number -->
                <div>
                    <label class="block font-semibold mb-1">Contact Number <span class="text-red-500">*</span></label>
                    <input type="number" v-model="form.phone"
                        class="border-b border-gray-400 bg-transparent w-full focus:outline-none focus:border-black py-1"
                        placeholder="Enter Phone Number" />
                    <div v-if="errors.phone" class="text-red-600 text-sm mt-1">{{ errors.phone }}</div>
                </div>

                <!-- Email -->
                <div>
                    <label class="block font-semibold mb-1">Email (Optional)</label>
                    <input type="email" v-model="form.email"
                        class="border-b border-gray-400 bg-transparent w-full focus:outline-none focus:border-black py-1"
                        placeholder="example@mail.com" />
                    <div v-if="errors.email" class="text-red-600 text-sm mt-1">{{ errors.email }}</div>
                </div>

                <!-- Date of Birth -->
                <div>
                    <label class="block font-semibold">Date of Birth (Optional)</label>
                    <input type="date" v-model="form.dob"
                        class="border-b border-gray-400 bg-transparent w-full focus:outline-none focus:border-black py-1" />
                    <div v-if="errors.dob" class="text-red-600 text-sm mt-1">{{ errors.dob }}</div>
                </div>

                <!-- Address -->
                <div class="md:col-span-2">
                    <label class="block font-semibold">Address <span class="text-red-500">*</span></label>
                    <textarea v-model="form.address"
                        class="border-b border-gray-400 bg-transparent w-full focus:outline-none focus:border-black py-1"
                        rows="2" placeholder="Enter address here..."></textarea>
                    <div v-if="errors.address" class="text-red-600 text-sm mt-1">{{ errors.address }}</div>
                </div>

                <!-- Gender -->
                <div>
                    <label class="block font-semibold mb-2">Gender <span class="text-red-500">*</span></label>
                    <div class="flex items-center space-x-6">
                        <label class="flex items-center space-x-2">
                            <input type="radio" v-model="form.gender" name="gender" value="Male"
                                class="form-radio accent-black" />
                            <span>Male</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" v-model="form.gender" name="gender" value="Female"
                                class="form-radio accent-black" />
                            <span>Female</span>
                        </label>
                    </div>
                    <div v-if="errors.gender" class="text-red-600 text-sm mt-1">{{ errors.gender }}</div>

                </div>

                <!-- Active Orders -->
                <div>
                    <label class="block font-semibold">Active Orders</label>
                    <input type="number" v-model.number="form.active_orders" class="input" min="0" placeholder="0" />

                </div>

                <!-- Payment Due -->
                <div>
                    <label class="block font-semibold">Payment Due (₹)</label>
                    <input type="number" v-model.number="form.payment_due"
                        class="border-b border-gray-400 bg-transparent w-full focus:outline-none focus:border-black py-1"
                        min="0" step="0.01" placeholder="0.00" />
                    <div v-if="errors.payment_due" class="text-red-600 text-sm mt-1">{{ errors.payment_due }}</div>
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
                                <input type="file" class="hidden" accept="image/*"
                                    @change="handleImageUpload($event, 'half_image')" />
                            </label>
                            <!-- 🚨 Error message -->
                            <div v-if="props.errors.half_image" class="text-red-600 text-sm mt-1">
                                {{ props.errors.half_image }}
                            </div>
                        </div>


                        <!-- Full Image Upload -->
                        <div>
                            <label class="block font-semibold mb-2">Full Image</label>
                            <label class="upload-box">
                                <img src="/images/full-coustomer.jpeg" alt="Full" class="w-6 h-6 mr-2" />
                                <span>Select Full Image</span>
                                <input type="file" class="hidden" accept="image/*"
                                    @change="handleImageUpload($event, 'full_image')" />
                            </label>
                            <!-- 🚨 Error message -->
                            <div v-if="props.errors.full_image" class="text-red-600 text-sm mt-1">
                                {{ props.errors.full_image }}
                            </div>
                        </div>
                    </div>
                    <div v-if="errors.phone" class="text-red-600 text-sm mt-1">{{errors.full_image}}</div>
                </div>


                <!-- Submit Button (Full Width Below) -->
                <div class="md:col-span-3">
                    <button @click="submitForm" type="button" class="btn w-full bg-[#167893] mt-4">Save &
                        Continue</button>

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
