<script setup>
import ColumnTitle from '@/Pages/Boards/Components/Columns/ColumnTitle.vue';
import RetroCard from '@/Pages/Boards/Components/Columns/RetroCard.vue';

const { column } = defineProps({ column: Object });
</script>

<template>
  <div class="">
    <ColumnTitle :column="column" />
    <div class="flex flex-wrap">
      <RetroCard
        v-for="card in column.cards"
        :key="card.id"
        :card="card"
        :color="card.user.color"
        :name="card.user.name"
      />
    </div>
  </div>
</template>
