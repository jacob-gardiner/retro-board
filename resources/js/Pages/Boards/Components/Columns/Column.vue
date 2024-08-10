<script setup>
import { useMouseInElement } from '@vueuse/core';
import { computed, inject, ref, watch } from 'vue';

import ColumnTitle from '@/Pages/Boards/Components/Columns/ColumnTitle.vue';
import RetroCard from '@/Pages/Boards/Components/Columns/RetroCard.vue';

const { column } = defineProps({ column: Object });

const dropZone = ref(null);
const { x, y, isOutside } = useMouseInElement(dropZone);

const { focusedColumn, updateFocusedColumn } = inject('focusedColumn');
const { draggingCard } = inject('draggingCard');

watch(isOutside, () => {
  if (isOutside.value) {
    updateFocusedColumn(null);
    return;
  }
  updateFocusedColumn(column);
});

const showDropStyles = computed(() => {
  return focusedColumn.value?.id !== column?.id && draggingCard.value;
});
</script>

<template>
  <div
    class="h-full"
    ref="dropZone"
    :class="{
      'opacity-50 bg-gray-50': showDropStyles,
    }"
  >
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
