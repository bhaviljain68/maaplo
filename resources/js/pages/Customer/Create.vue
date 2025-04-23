<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import { reactive } from 'vue';
import { Icon } from '@iconify/vue';

const props = defineProps<{
    errors: Record<string, string>,
    user_id: number
}>();
const form = reactive({
    user_id: props.user_id, // Replace with actual user ID
    name: '',
    gender: '',
    phone: '',
    email: '',
    address: '',
    // notes: '', // Optional: Can be expanded
    dob: '',
    active_orders: 0,
    payment_due: 0.00,
    half_image: null,
    full_image: null,
    half_image_preview: '',
    full_image_preview: ''
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

    if (file && file.size > 2 * 1024 * 1024) {
        alert('Image must be less than 2MB.');
        return;
    }

    form[field] = file;

    // Set preview
    const previewField = field + '_preview' as 'half_image_preview' | 'full_image_preview';
    form[previewField] = file ? URL.createObjectURL(file) : '';
};
</script>

<template>

    <Head title="Costomer" />
    <AppLayout>
        <div class="px-4 py-8 max-w-6xl mx-auto">
            <div>
                <h1 class="text-[24px] leading-[16px] font-bold tracking-[0] text-gray-800 font-[Convergence]">
                    New Customer
                </h1>
            </div>
            <form class="flex flex-col lg:mt-5 gap-6 rounded-lg lg:border lg:border-[#167893] p-0 lg:p-4">
                <h1 class="text-xl font-bold lg:mb-6 lg:mt-0 mt-6">Enter Details</h1>
                <!-- Customer Name -->
                <div>
                    <label class="block font-[Lato] text-[18px] leading-[16px] tracking-[0] mb-1">
                        Customer Name <span class="text-red-500">*</span>
                    </label>

                    <input type="text" v-model="form.name" placeholder="Enter Customer Name"
                        class="border-b border-black bg-transparent w-full focus:outline-none focus:border-black py-1" />
                    <div v-if="errors.name" class="text-red-600 text-sm mt-1">{{ errors.name }}</div>
                </div>

                <!-- Contact Number -->
                <div>
                    <label class="block font-[Lato] text-[18px] leading-[16px] tracking-[0] mb-1">Contact Number <span
                            class="text-red-500">*</span></label>
                    <input type="number" v-model="form.phone"
                        class="border-b border-black bg-transparent w-full focus:outline-none focus:border-black py-1"
                        placeholder="Enter Phone Number" />
                    <div v-if="errors.phone" class="text-red-600 text-sm mt-1">{{ errors.phone }}</div>
                </div>

                <!-- Email -->
                <div>
                    <label class="block font-[Lato] text-[18px] leading-[16px] tracking-[0] mb-1">Email
                        (Optional)</label>
                    <input type="email" v-model="form.email"
                        class="border-b border-black bg-transparent w-full focus:outline-none focus:border-black py-1"
                        placeholder="example@mail.com" />
                    <div v-if="errors.email" class="text-red-600 text-sm mt-1">{{ errors.email }}</div>
                </div>

                <!-- Date of Birth -->
                <div>
                    <label class="block font-[Lato] text-[18px] leading-[16px] tracking-[0] mb-1">Date of Birth
                        (Optional)</label>
                    <input type="date" v-model="form.dob"
                        class="border-b border-black bg-transparent w-full focus:outline-none focus:border-black py-1" />
                    <div v-if="errors.dob" class="text-red-600 text-sm mt-1">{{ errors.dob }}</div>
                </div>

                <!-- Address -->
                <div class="md:col-span-2">
                    <label class="bblock font-[Lato] text-[18px] leading-[16px] tracking-[0] mb-1">Address <span
                            class="text-red-500">*</span></label>
                    <textarea v-model="form.address"
                        class="border-b border-black bg-transparent w-full focus:outline-none focus:border-black py-1"
                        rows="2" placeholder="Enter address here..."></textarea>
                    <div v-if="errors.address" class="text-red-600 text-sm mt-1">{{ errors.address }}</div>
                </div>

                <!-- Gender -->
                <div class="flex">
                    <div class="mr-3">
                        <label class="block font-[Lato] text-[18px] leading-[16px] tracking-[0] mb-1">Gender <span
                                class="text-red-500">*</span></label>
                    </div>
                    <div class="flex items-center space-x-6 text-black">
                        <label class="flex items-center space-x-2">
                            <input type="radio" v-model="form.gender" name="gender" value="m"
                                class="form-radio accent-black" />
                            <span>Male</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" v-model="form.gender" name="gender" value="f"
                                class="form-radio accent-black" />
                            <span>Female</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" v-model="form.gender" name="gender" value="o"
                                class="form-radio accent-black" />
                            <span>Other</span>
                        </label>

                    </div>
                    <div v-if="errors.gender" class="text-red-600 text-sm mt-1">{{ errors.gender }}</div>

                </div>

                <!-- Active Orders -->
                <div>
                    <label class="block font-[Lato] text-[18px] leading-[16px] tracking-[0] mb-5">Active Orders</label>
                    <input type="number" v-model.number="form.active_orders" class="input" min="0" placeholder="0" />

                </div>

                <!-- Payment Due -->
                <div>
                    <label class="block font-[Lato] text-[18px] leading-[16px] tracking-[0] mb-1">Payment Due
                        (₹)</label>
                    <input type="number" v-model.number="form.payment_due"
                        class="border-b border-gray-400 bg-transparent w-full focus:outline-none focus:border-black py-1"
                        min="0" step="0.01" placeholder="0.00" />
                    <div v-if="errors.payment_due" class="text-red-600 text-sm mt-1">{{ errors.payment_due }}</div>
                </div>

                <!-- Upload Section -->
                <div>
                    <h2 class="block font-[Lato] text-[18px] leading-[16px] tracking-[0] mb-5">Photos <span
                            class="text-red-500">*</span></h2>

                    <div class="flex flex-row justify-center item-center gap-6">

                        <!-- Half Image Upload -->
                        <div class="w-32 h-full gap-[10px] p-2 shadow-[0px_0px_6.1px_0px_#00000040]">
                            <div class="flex">
                                <label class="block font-semibold mb-2 item-center">Face Image</label>
                                <Icon icon="gridicons:image" width="24" height="24" />
                            </div>
                            <label class="upload-box cursor-pointer">
                                <img :src="form.half_image_preview || '/images/half-coustomer.jpeg'"
                                    alt="Half Image Preview" class="w-24 h-24 object-cover mb-2" />

                                <input type="file" class="hidden" accept="image/*"
                                    @change="handleImageUpload($event, 'half_image')" />
                            </label>
                            <div v-if="props.errors.half_image" class="text-red-600 text-sm mt-1">
                                {{ props.errors.half_image }}
                            </div>
                        </div>


                        <!-- Full Image Upload -->
                        <div class="w-32 h-full gap-[10px]  p-2 shadow-[0px_0px_6.1px_0px_#00000040]">
                            <div class="flex">
                                <label class="block font-semibold mb-2 item-center">Full Image</label>
                                <Icon icon="gridicons:image" width="24" height="24" />
                            </div>
                            <label class="upload-box cursor-pointer">
                                <img :src="form.full_image_preview || '/images/full-coustomer.jpeg'"
                                    alt="Full Image Preview" class="w-24 h-24 object-cover mb-2" />

                                <input type="file" class="hidden" accept="image/*"
                                    @change="handleImageUpload($event, 'full_image')" />
                            </label>
                            <div v-if="props.errors.full_image" class="text-red-600 text-sm mt-1">
                                {{ props.errors.full_image }}
                            </div>
                        </div>
                    </div>
                    <div v-if="errors.phone" class="text-red-600 text-sm mt-1">{{ errors.full_image }}</div>
                </div>


                <!-- Submit Button (Full Width Below) -->
                <div class="md:col-span-3">
                    <button @click="submitForm" type="button"
                        class="rounded-full p-3 text-white w-full bg-[#167893] mt-4">Save &
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
