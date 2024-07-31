<script setup>
import { router } from '@inertiajs/vue3';

import AppLayout from '@/Layouts/AppLayout.vue';
import Column from '@/Pages/Boards/Components/Columns/Column.vue';
import CreateCard from '@/Pages/Boards/Components/Columns/CreateCard.vue';
import CreateColumn from '@/Pages/Boards/Components/Columns/CreateColumn.vue';

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
</script>

<template>
  <AppLayout title="Retro Boards">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ board.title }}
      </h2>
    </template>
    <div class="flex flex-col grow">
      <div class="flex overflow-x-auto">
        <div
          v-for="column in board.columns"
          class="border-r-4 border-dashed column flex flex-col justify-between"
        >
          <Column :column="column" />
          <div class="flex justify-center">
            <CreateCard :boardId="board.id" :columnId="column.id" />
          </div>
        </div>
        <div class="column p-3">
          <CreateColumn :boardId="board.id" />
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<style scoped>
.column {
  min-width: 33.3333vw;
  min-height: 75vh;
}
</style>
