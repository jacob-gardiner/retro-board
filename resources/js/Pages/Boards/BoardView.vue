<script setup>
import { router } from '@inertiajs/vue3';

import AppLayout from '@/Layouts/AppLayout.vue';
import BoardInteractionsProvider from '@/Pages/Boards/BoardInteractionsProvider.vue';
import BoardInviteButton from '@/Pages/Boards/Components/BoardInviteButton.vue';
import BoardTimer from '@/Pages/Boards/Components/BoardTimer.vue';
import RetroBoard from '@/Pages/Boards/Components/RetroBoard.vue';

const { board, invite_link } = defineProps({
  board: Object,
  invite_link: String,
});

const reloadBoard = () => {
  router.reload({ only: ['board'] });
};

Echo.private(`boards.${board.id}`).listen('ColumnCreated', reloadBoard);
Echo.private(`boards.${board.id}`).listen('ColumnUpdated', reloadBoard);
Echo.private(`boards.${board.id}`).listen('CardCreated', reloadBoard);
Echo.private(`boards.${board.id}`).listen('CardUpdated', reloadBoard);
Echo.private(`boards.${board.id}`).listen('CardDeleted', reloadBoard);
Echo.private(`boards.${board.id}`).listen('BoardUpdated', reloadBoard);
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
        <div class="flex-grow flex justify-end">
          <BoardInviteButton :url="invite_link" class="" />
        </div>
      </div>
    </template>
    <BoardInteractionsProvider>
      <RetroBoard :board="board" />
    </BoardInteractionsProvider>
  </AppLayout>
</template>
