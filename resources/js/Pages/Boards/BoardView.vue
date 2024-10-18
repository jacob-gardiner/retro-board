<script setup>
import { router } from '@inertiajs/vue3';

import AppLayout from '@/Layouts/AppLayout.vue';
import BoardInteractionsProvider from '@/Pages/Boards/BoardInteractionsProvider.vue';
import Column from '@/Pages/Boards/Components/Columns/Column.vue';
import CreateCard from '@/Pages/Boards/Components/Columns/CreateCard.vue';
import CreateColumn from '@/Pages/Boards/Components/Columns/CreateColumn.vue';
import RetroBoard from '@/Pages/Boards/Components/RetroBoard.vue';

const { board } = defineProps({ board: Object });

Echo.private(`boards.${board.id}`).listen('ColumnCreated', (e) => {
  router.reload({ only: ['board'] });
});

Echo.private(`boards.${board.id}`).listen('ColumnUpdated', (e) => {
  router.reload({ only: ['board'] });
});

Echo.private(`boards.${board.id}`).listen('CardCreated', (e) => {
  router.reload({ only: ['board'] });
});

Echo.private(`boards.${board.id}`).listen('CardUpdated', (e) => {
  router.reload({ only: ['board'] });
});
</script>

<template>
  <AppLayout title="Retro Boards">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ board.title }}
      </h2>
    </template>
    <BoardInteractionsProvider>
      <RetroBoard :board="board" />
    </BoardInteractionsProvider>
  </AppLayout>
</template>
