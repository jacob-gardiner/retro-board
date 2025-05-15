<script setup>
import { computed, inject, ref } from 'vue';

import Column from '@/Pages/Boards/Components/Columns/Column.vue';
import CreateCard from '@/Pages/Boards/Components/Columns/CreateCard.vue';
import CreateColumn from '@/Pages/Boards/Components/Columns/CreateColumn.vue';

const { board } = defineProps({ board: Object });
const retroWrapper = ref(null);

const { contentHeight } = inject('pageDetails');

const boardHeight = computed(() => {
  return contentHeight.value - retroWrapper.value?.getBoundingClientRect().top;
});
</script>

<template>
  <div ref="retroWrapper" class="flex flex-col grow h-full">
    <div class="">
      <div class="flex overflow-x-auto relative">
        <div
          v-for="column in board.columns"
          :style="`max-height: ${boardHeight - 15}px; min-height: ${boardHeight - 15}px`"
          class="overflow-y-auto h-full border-r-4 border-dashed column flex flex-col justify-between min-[1900px]:min-w-[33.3333vw] xl:min-w-[700px] lg:min-w-[50vw] md:min-w-[50vw] min-w-full"
        >
          <Column :column="column" />
          <div class="sticky bottom-0 z-50 w-full flex justify-around">
            <CreateCard
              :columnId="column.id"
              :boardId="board.id"
              class="w-4/5"
            />
          </div>
        </div>

        <div
          class="2xl:min-w-[33.3333vw] xl:min-w-[40vw] lg:min-w-[50vw] md:min-w-[50vw] min-w-full p-3"
        >
          <CreateColumn :boardId="board.id" />
        </div>
      </div>
    </div>
  </div>
</template>
