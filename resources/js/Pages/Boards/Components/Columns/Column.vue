<script setup>
import RetroCard from "@/Pages/Boards/Components/Columns/RetroCard.vue";

const {column} = defineProps({column: Object})
</script>

<template>
    <div class="">
        <h3 class="text-2xl capitalize tracking-wider text-gray-500 px-3">
            {{ column.title }}
        </h3>
        <RetroCard v-for="card in column.cards" :key="card.id" :card="card" />
    </div>
</template>
