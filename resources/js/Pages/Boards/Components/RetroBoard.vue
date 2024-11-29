<script setup>
import { inject } from 'vue';

import Column from '@/Pages/Boards/Components/Columns/Column.vue';
import CreateCard from '@/Pages/Boards/Components/Columns/CreateCard.vue';
import CreateColumn from '@/Pages/Boards/Components/Columns/CreateColumn.vue';

const { board } = defineProps({ board: Object });

const { contentHeight } = inject('pageDetails');
</script>

<template>
  <div class="flex flex-col grow h-full">
    <div class="">
      <div
        class="flex overflow-x-auto"
        :style="`min-height: ${contentHeight}px`"
      >
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
  </div>
</template>

<style scoped>
.column {
  min-width: 33.3333vw;
}
</style>
