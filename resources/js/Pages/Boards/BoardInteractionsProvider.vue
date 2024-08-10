<script setup>
import { useForm } from '@inertiajs/vue3';
import { provide, ref } from 'vue';

const focusedColumn = ref(null);
const updateFocusedColumn = (column) => {
  focusedColumn.value = column;
};

provide('focusedColumn', {
  focusedColumn,
  updateFocusedColumn,
});

const draggingCard = ref(null);
const updateDraggingCard = (card) => {
  draggingCard.value = card;
};
const form = useForm({
  column_id: draggingCard.value?.column_id,
});

const dropCard = () => {
  console.log('dropping');
  if (!focusedColumn.value?.id) return;

  form.column_id = focusedColumn.value.id;
  form.patch(
    `/boards/${draggingCard.value?.board_id}/columns/${draggingCard.value?.column_id}/cards/${draggingCard.value?.id}`,
    {
      onSuccess: () => {
        form.reset();
      },
    },
  );
};

provide('draggingCard', {
  draggingCard,
  updateDraggingCard,
  dropCard,
});
</script>

<template><slot /></template>

<style scoped></style>
