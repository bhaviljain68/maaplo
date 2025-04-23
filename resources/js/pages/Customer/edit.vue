<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
  customer: Object
});

const form = useForm({
  name: props.customer.name,
  email: props.customer.email,
  phone:props.customer.phone,
  address:props.customer.address,
  gender:props.customer.gender,
  payment_due:props.customer.payment_due,
});
</script>


<template>
<h1>{{ customer.name }}</h1>
<h1>{{ customer.email }}</h1>
<h1>{{ customer.phone }}</h1>
<h1>{{ customer.address }}</h1>
<h1>{{ customer.gender }}</h1>

</template>
