<script setup lang="ts">
import Footer from '@/components/Footer.vue';
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import type { BreadcrumbItemType } from '@/types';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
</script>

<template>

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="min-h-[calc(100vh-64px)] flex flex-col">
            <!-- Breadcrumbs or other header content -->
            <div class="flex-grow">
                <slot />
            </div>
            <!-- Footer -->
            <div>
                <Footer />
            </div>
        </div>

    </AppLayout>
</template>
