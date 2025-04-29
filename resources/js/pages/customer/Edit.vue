<script setup lang="ts">
import { ref, computed } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { useForm, Link, Head } from '@inertiajs/vue3';
import { Icon } from '@iconify/vue';
import Button from '@/components/Button.vue';
const toast = new ToastMagic();
const props = defineProps<{
    customer: {
        id: number;
        name: string;
        email: string;
        phone: string;
        address: string;
        gender: string;
        notes: Array<{ label: string; text: string }>;
        payment_due?: number;
        face_image: string;
        full_body_image: string;
    }
}>();
const form = useForm({
    name: props.customer.name,
    email: props.customer.email,
    phone: props.customer.phone,
    address: props.customer.address,
    gender: props.customer.gender,
    payment_due: props.customer.payment_due,
    half_image: null,
    full_image: null,
    notes: props.customer.notes.length > 0 ? props.customer.notes : [{ label: '', text: '' }],
});

// Image preview refs
const faceImagePreview = ref<string | null>(null);
const fullBodyImagePreview = ref<string | null>(null);

// Computed URLs for displaying current or preview images
const faceImageUrl = computed(() => {
    return faceImagePreview.value
        ? faceImagePreview.value
        : `/storage/${props.customer.face_image?.replace(/^storage\//, '')}`;
});

const fullBodyImageUrl = computed(() => {
    return fullBodyImagePreview.value
        ? fullBodyImagePreview.value
        : `/storage/${props.customer.full_body_image?.replace(/^storage\//, '')}`;
});

// Handlers to update form images and preview
const handleFaceImageChange = (event: Event) => {
    const file = (event.target as HTMLInputElement)?.files?.[0];
    if (file) {
        form.half_image = file;
        faceImagePreview.value = URL.createObjectURL(file);
    }
};

const handleFullBodyImageChange = (event: Event) => {
    const file = (event.target as HTMLInputElement)?.files?.[0];
    if (file) {
        form.full_image = file;
        fullBodyImagePreview.value = URL.createObjectURL(file);
    }
};

const updateCustomer = () => {
    if (!validateNotes()) return;
    form.transform((data) => ({
        ...data,
        _method: 'put',
    }))
        .post(route('customers.update', props.customer.id), {
            onSuccess: () => {
                toast.success("Customer updated successfully!");
            },
            onError: (errors) => {
                console.error('Failed to update customer:', errors);
                alert('An error occurred while updating the customer. Please check the form and try again.');
            },
        });
};

const noteErrors = ref<string | null>(null);

const addNote = () => {
    form.notes.push({ label: '', text: '' });
};

const removeNote = (index: number) => {
    form.notes.splice(index, 1);
};

const validateNotes = () => {
    const isValid = form.notes.length > 0 && form.notes.every(
        note => note.label.trim() !== '' && note.text.trim() !== ''
    );
    noteErrors.value = isValid ? null : 'All notes must have a label and text.';
    return isValid;
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
                class="flex flex-col lg:mt-5 gap-6 rounded-lg lg:border lg: --border-primary p-0 lg:p-4">
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

                </div>
                <!-- Notes Section -->
                <div class="notes-section">
                    <div class="flex items-center justify-between mb-2">
                        <label class="block font-[Lato] text-[18px]">Notes <span class="text-red-500">*</span></label>

                        <div class="flex items-center space-x-3">
                            <span class="text-sm text-gray-600">Total: {{ form.notes.length }}</span>
                            <button type="button" @click="addNote"
                                class="flex items-center text-green-500 hover:text-green-600 transition">
                                <Icon icon="mdi:plus-circle-outline" width="20" height="20" class="mr-1" />
                                <span class="text-sm font-medium">Add Note</span>
                            </button>
                        </div>
                    </div>

                    <div v-for="(note, index) in form.notes" :key="index" class="mb-4 flex gap-4 items-start">
                        <div class="w-full">
                            <label class="block text-sm mb-1">Label</label>
                            <input type="text" placeholder="Write your Label..." v-model="note.label"
                                class="border-b border-gray-400 bg-transparent w-full py-1 focus:outline-none" />
                            <label class="block text-sm mt-2 mb-1">Note</label>
                            <textarea v-model="note.text"
                                class="border-b border-gray-400 bg-transparent w-full py-1 focus:outline-none" rows="2"
                                placeholder="Write your note..."></textarea>
                        </div>

                        <!-- Remove note button -->
                        <div class="flex items-center pt-6" v-if="form.notes.length > 1">
                            <button type="button" @click="removeNote(index)"
                                class="flex items-center text-red-500 hover:text-red-600 transition">
                                <Icon icon="mdi:minus-circle-outline" width="24" height="24" class="mr-1" />
                            </button>
                        </div>
                    </div>

                    <!-- Validation error -->
                    <div v-if="noteErrors" class="text-red-600 text-sm mt-1">{{ noteErrors }}</div>
                </div>

                <!-- Customer Images -->
                <div class="mb-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Face Image -->
                    <div class="bg-white shadow-md rounded-lg p-4 border border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-800 mb-3">Face Image</h2>
                        <div
                            class="w-full h-64 bg-gray-50 flex items-center justify-center rounded-md overflow-hidden border">
                            <img :src="faceImageUrl" alt="Face Image" class="object-cover h-full w-full" />
                        </div>
                        <label class="mt-4 block">
                            <span class="text-sm text-gray-600">Upload new image</span>
                            <input type="file" @change="handleFaceImageChange"
                                class="block w-full text-sm text-gray-500 mt-1 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer" />
                        </label>
                    </div>

                    <!-- Full Body Image -->
                    <div class="bg-white shadow-md rounded-lg p-4 border border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-800 mb-3">Full Image</h2>
                        <div
                            class="w-full h-64 bg-gray-50 flex items-center justify-center rounded-md overflow-hidden border">
                            <img :src="fullBodyImageUrl" alt="Full Body Image" class="object-cover h-full w-full" />
                        </div>
                        <label class="mt-4 block">
                            <span class="text-sm text-gray-600">Upload new image</span>
                            <input type="file" @change="handleFullBodyImageChange"
                                class="block w-full text-sm text-gray-500 mt-1 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer" />
                        </label>
                    </div>
                </div>

                <!-- Update Button-->
                <div class="md:col-span-3">
                    <Button :disabled="form.processing" :color="'primary'" :padding="'lg'" :rounded="'full'"
                        :textSize="'base'">
                        Update Customer
                    </Button>

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
