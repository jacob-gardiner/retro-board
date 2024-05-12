<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {ref} from "vue";

defineProps({board: Array})

const showModal = ref(false);
</script>

<template>
    <AppLayout title="Retro Boards">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ board.title }}
            </h2>
        </template>
    </AppLayout>
</template>
