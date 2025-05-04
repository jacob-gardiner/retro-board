<script setup>
import { router } from '@inertiajs/vue3';

import AppLayout from '@/Layouts/AppLayout.vue';
import BoardInteractionsProvider from '@/Pages/Boards/BoardInteractionsProvider.vue';
import BoardTimer from '@/Pages/Boards/Components/BoardTimer.vue';
import RetroBoard from '@/Pages/Boards/Components/RetroBoard.vue';

const { board } = defineProps({ board: Object });

const reloadBoard = () => {
  router.reload({ only: ['board'] });
};

Echo.private(`boards.${board.id}`).listen('ColumnCreated', reloadBoard);
Echo.private(`boards.${board.id}`).listen('ColumnUpdated', reloadBoard);
Echo.private(`boards.${board.id}`).listen('CardCreated', reloadBoard);
Echo.private(`boards.${board.id}`).listen('CardUpdated', reloadBoard);
Echo.private(`boards.${board.id}`).listen('BoardUpdated', () => {
  console.log('board updated');
  reloadBoard();
});
Echo.private(`boards.${board.id}`).listen('VoteCreated', reloadBoard);
</script>

<template>
  <AppLayout title="Retro Boards">
    <template #header>
      <div class="flex">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight w-1/3">
          {{ board.title }}
        </h2>
        <BoardTimer :board="board" />
      </div>
    </template>
    <BoardInteractionsProvider>
      <RetroBoard :board="board" />
    </BoardInteractionsProvider>
  </AppLayout>
</template>
