<script setup>
import { useDraggable, usePointer } from '@vueuse/core';
import { inject, ref, watch } from 'vue';

import CardBody from '@/Pages/Boards/Components/Columns/CardBody.vue';

const { card } = defineProps({ card: Object, color: String, name: String });

const isDragging = ref(false);
const el = ref(null);
const style = ref({ left: `0px`, top: `0px` });

const { x: pointerX, y: pointerY, pressure, pointerType } = usePointer();

watch(pressure, () => {
  if (pressure.value === 0) {
    if (isDragging.value) {
      dropCard();
      isDragging.value = false;
      updateDraggingCard(null);
    }
  }
});
watch([pointerX, pointerY, pressure], () => {
  if (pressure.value === 0.5) {
    style.value = {
      left: `${pointerX.value - 40}px`,
      top: `${pointerY.value - 20}px`,
    };
  }
});

const dragStart = () => {
  isDragging.value = true;
  updateDraggingCard(card);
};

const { updateDraggingCard, dropCard } = inject('draggingCard');
</script>

<template>
  <div class="">
    <div
      v-if="isDragging"
      :class="`p-3 rounded cursor-grabbing rotate-12 shadow-md mb-2 mx-2 w-28 bg-${color}-100`"
      ref="el"
      :style="style"
      style="position: fixed; z-index: 9999999"
    >
      <CardBody :card="card" :color="card.user.color" :name="card.user.name" />
    </div>
    <div
      @mousedown="dragStart"
      :class="`p-3 rounded shadow cursor-grab mb-2 mx-2 w-28  ${isDragging ? `shadow-inner opacity-75 backdrop-blur-md bg-${color}-100/30` : `bg-${color}-100`}`"
    >
      <CardBody :card="card" :color="card.user.color" :name="card.user.name" />
    </div>
  </div>
</template>

<style scoped></style>
