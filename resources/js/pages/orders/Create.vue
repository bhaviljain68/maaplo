<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { Icon } from '@iconify/vue';
import DateIcon from '@/components/DateIcon.vue';
import CustomerListDropdown from '@/components/Items/CustomerListDropdown.vue';
import { computed, reactive, ref } from 'vue';
import ItemModel from '@/components/Items/ItemModel.vue';
import Button from '@/components/Button.vue';
import { useForm } from '@inertiajs/vue3';
const props = defineProps(["users", "customers"])
const showModal = ref(false);
const items = ref([]);
const toast = new ToastMagic();
let insertData = reactive({
    user_id: false,
    customer_id: false,
    order_number: false,
    status: false,
    total_amount: false,
    advance_paid: false,
    delivery_date: false,
    close_date: false,
    notes: false,
    item_template_id:false,
    name:false,
    measurements:false,
    design_details:false,
    colors:false,
    material:false,
    notes:false,
    trial_dates:false,
    price:false,
    status:false,
    material_code:false,
    work_type:false,
    refrence_dress:false,
    material_cost:false,
    stiching_cost:false,
    item_cost:false
});


function handleAddItem(newItem) {
    items.value.push({ ...newItem });
    showModal.value = false;
}

let measurements = reactive({});
let setMeasurements = (value) => {
    measurements = value
}

let form = useForm({
    user_id: '',
    customer_id: '',
    order_number: '',
    status: '',
    total_amount: '',
    advance_paid: '',
    delivery_date: '',
    close_date: '',
    notes: '',
});

// set data which is set by child components 
let setFormData = (data) => {
    console.log('check form data:', data);
    insertData.user_id = data.user_id //done
    insertData.customer_id = data.customer_id //done
    // insertData.order_number = data.order_number 
    // insertData.status = data.status
    insertData.total_amount = data.total_amount
    insertData.advance_paid = data.advance_paid
    insertData.delivery_date = data.delivery_date
    insertData.close_date = data.close_date
    insertData.notes = data.notes
}

// set data Into Form which set by this `setFormData` function end emits
form = computed(() => {

    console.log(insertData);

    return insertData
})


//check if any required field is blank or null so create order button does not be active
// Disable button if any required field is empty
let disabled = computed(() => {
    return (
        !form.user_id ||
        !form.customer_id ||
        !form.order_number ||
        !form.status ||
        !form.total_amount ||
        !form.advance_paid ||
        !form.delivery_date
    );
});


let create = () => {
    form.post(route('orders.store'), {
        onSuccess: () => {
            toast.success('Order Created Successfully');
        },
        onError: (error) => {
            toast.error('failed To create order! reason:' + error);
        }
    })
}


</script>

<template>
    <AppLayout>
        <div class="px-4 py-8 max-w-6xl mx-auto">
            <div class="flex flex-row justify-between">
                <div>
                    <h1 class="text-[24px] mt-3 leading-[16px] font-bold tracking-[0] text-gray-800 font-[Convergence]">
                        New Order
                    </h1>
                </div>
                <div class="self-center">
                    <Button :disabled="disabled" @click="create">Create Order</Button>
                </div>
            </div>
            <div class="flex flex-col lg:mt-5 rounded-lg lg:border lg:border-primary p-0 lg:p-4">

                <h1 class="text-xl font-bold lg:mb-6 lg:mt-0 mt-6">Enter Details</h1>

                <!-- selected customer list -->
                <CustomerListDropdown :customers="customers" @setMeasurements="setMeasurements" :insertData="insertData"
                    @setFormData="setFormData" />

                <!-- Delivery Date -->
                <DateIcon :insertData="insertData" @setFormData="setFormData" />

                <!-- items -->
                <div class="mt-5">
                    <div>
                        <div class="flex flex-row justify-between items-center">
                            <div>
                                <label class="font-lato text-base font-normal leading-4 tracking-normal">
                                    Items
                                </label>
                            </div>
                            <!-- Add Icon -->
                            <div @click="showModal = true" class="cursor-pointer inline-block">
                                <Icon icon="material-symbols:add-rounded" width="20" height="20" />
                            </div>
                        </div>
                        <!-- Modal Backdrop -->
                        <div v-if="showModal" class="fixed inset-0 bg-black/50 z-40" @click.self="showModal = false">
                        </div>

                        <!-- Modal Content -->
                        <ItemModel :measurements="measurements" :showModal="showModal" @close="showModal = false"
                            @handleAddItem="handleAddItem" :insertData="insertData" @setFormData="setFormData" />

                        <!-- table -->
                        <!-- Items Table -->
                        <div class="mt-4 overflow-x-auto">
                            <table class="min-w-full border border-gray-300 text-sm text-left">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="p-2 border">Work Type</th>
                                        <th class="p-2 border">Item type</th>
                                        <th class="p-2 border">Delivery Date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in items" :key="index">
                                        <td class="p-2 border">{{ item.workType }}</td>
                                        <td class="p-2 border">{{ item.itemType }}</td>
                                        <td class="p-2 border">{{ item.deliveryDate }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>