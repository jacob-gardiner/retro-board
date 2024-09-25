<script setup>
import { provide } from 'vue';

import { useBoardInteractions } from '@/Pages/Boards/Composables/useBoardInteractions.js';

const {
  focusedColumn,
  updateFocusedColumn,
  draggingCard,
  updateDraggingCard,
  dropCard,
} = useBoardInteractions();

provide('focusedColumn', {
  focusedColumn,
  updateFocusedColumn,
});

provide('draggingCard', {
  draggingCard,
  updateDraggingCard,
  dropCard,
});
</script>

<template><slot /></template>

<style scoped></style>
