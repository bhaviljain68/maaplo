<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { useForm, Link, Head } from '@inertiajs/vue3';
import { Icon } from '@iconify/vue';

const props = defineProps<{
    customer: {
        id: number;
        name: string;
        email: string;
        phone: string;
        address: string;
        gender: string;
        payment_due?: number;
    }
}>();


console.log('Gender:', props.customer.gender);
const form = useForm({
    name: props.customer.name,
    email: props.customer.email,
    phone: props.customer.phone,
    address: props.customer.address,
    gender: props.customer.gender,
    payment_due: props.customer.payment_due,
});

const updateCustomer = () => {
    form.put(route('customers.update', props.customer.id));
};


</script>

<template>
    <Head title="Costomer" />
    <AppLayout>
        <div class="px-4 py-8 max-w-6xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-[24px] leading-[16px] font-bold tracking-[0] text-gray-800 font-[Convergence]">
                    Edit Customer
                </h1>
                <div class="text-gray-600">
                    <Link :href="route('customers.index')" class="flex items-center gap-1 hover:text-black">
                    <Icon icon="material-symbols:arrow-back-rounded" width="24" height="24" />
                    <span class="text-[16px] font-medium">Back</span>
                    </Link>
                </div>
            </div>
            <!-- Edit Form -->
            <form @submit.prevent="updateCustomer"
                class="flex flex-col lg:mt-5 gap-6 rounded-lg lg:border lg:border-[#167893] p-0 lg:p-4">
                <!-- <h1 class="text-xl font-bold lg:mb-6 lg:mt-0 mt-6">Edit Details</h1> -->
                <!-- Customer Name -->
                <div>
                    <label class="block font-[Lato] text-[18px] leading-[16px] tracking-[0] mb-1">Customer Name</label>
                    <input v-model="form.name" type="text"
                        class="border-b border-black bg-transparent w-full focus:outline-none focus:border-black py-1" />
                </div>

                <!-- Contact Number -->
                <div>
                    <label class="block font-[Lato] text-[18px] leading-[16px] tracking-[0] mb-1">Contact Number</label>
                    <input v-model="form.phone" type="text"
                        class="border-b border-black bg-transparent w-full focus:outline-none focus:border-black py-1" />
                </div>

                <!-- Email -->
                <div>
                    <label class="block font-[Lato] text-[18px] leading-[16px] tracking-[0] mb-1">Email</label>
                    <input v-model="form.email" type="email"
                        class="border-b border-black bg-transparent w-full focus:outline-none focus:border-black py-1" />
                </div>


                <!-- Address -->
                <div class="md:col-span-2">
                    <label class="bblock font-[Lato] text-[18px] leading-[16px] tracking-[0] mb-1">Address</label>
                    <textarea v-model="form.address"
                        class="border-b border-black bg-transparent w-full focus:outline-none focus:border-black py-1"
                        rows="2" placeholder="Enter address here..."></textarea>
                </div>

                <!-- Gender -->
                <div class="flex flex-col mb-4">
                    <div class="mr-3">
                        <label class="block mb-4 font-[Lato] text-[18px] leading-[16px] tracking-[0] mb-1">
                            Gender
                        </label>
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
                    <div v-if="form.errors.gender" class="text-red-600 text-sm mt-1">
                        {{ form.errors.gender }}
                    </div>
                </div>

                <!-- Update Button-->
                <div class="md:col-span-3">
                    <button type="submit" class="rounded-full p-3 text-white w-full bg-[#167893] mt-4"
                        :disabled="form.processing">
                        Update Customer
                    </button>
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
