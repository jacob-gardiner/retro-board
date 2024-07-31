<script setup>
import RetroCard from "@/Pages/Boards/Components/Columns/RetroCard.vue";
import ColumnTitle from "@/Pages/Boards/Components/Columns/ColumnTitle.vue";

const {column} = defineProps({column: Object})
</script>

<template>
    <div class="">
        <ColumnTitle :column="column" />
        <RetroCard v-for="card in column.cards" :key="card.id" :card="card" />
    </div>
</template>
