<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
const props = defineProps(["users","customers"])


</script>

<template>
    <AppLayout>
        <div class="lg:mx-auto p-4">
        <pre>
            {{ props.users }}
            {{ props.customers }}
        </pre>
        </div>
    </AppLayout>
</template> 
