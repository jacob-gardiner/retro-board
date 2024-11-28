<script setup>
import { useForm } from '@inertiajs/vue3';
import { useMouseInElement, usePointer } from '@vueuse/core';
import { inject, ref, watch } from 'vue';

import CardBody from '@/Pages/Boards/Components/Columns/CardBody.vue';

const props = defineProps({ card: Object, color: String, name: String });

const isDragging = ref(false);
const el = ref(null);
const cardInteractionZone = ref(null);
const style = ref({ left: `0px`, top: `0px` });

const { x: pointerX, y: pointerY, pressure } = usePointer();
const { isOutside } = useMouseInElement(cardInteractionZone);

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
  updateDraggingCard(props.card);
};

const { updateDraggingCard, dropCard } = inject('draggingCard');

const form = useForm({});

const onVote = () => {
  form.post(`/cards/${props.card.id}/votes`, {
    onSuccess: () => {
      form.reset();
    },
  });
};
</script>

<template>
  <div class="">
    <div
      v-if="isDragging"
      :class="`p-3 rounded cursor-grabbing rotate-12 fixed z-50 shadow-md mb-2 mx-2 w-28 bg-${color}-100`"
      :data-testid="`retroCard-dragging-${card.id}`"
      ref="el"
      :style="style"
    >
      <CardBody :card="card" :color="color" :name="name" />
    </div>
    <div ref="cardInteractionZone" class="p-1">
      <div class="relative">
        <div
          @mousedown="dragStart"
          :data-testid="`retroCard-${card.id}`"
          :class="`p-3 rounded shadow cursor-grab mb-2 mx-2 w-28  ${isDragging ? `shadow-inner opacity-75 backdrop-blur-md bg-${color}-100/30` : `bg-${color}-100`}`"
        >
          <CardBody :card="card" :color="color" :name="name" />
          <div class="grid grid-cols-2">
            <span :class="`text-xs w-full text-${color}-700`">{{ name }}</span>
            <span class="text-gray-900 w-full text-right">{{
              card.votes?.length
            }}</span>
          </div>
        </div>
        <div
          v-if="!isOutside"
          @click="onVote"
          class="absolute cursor-pointer p-1.5 -right-0.5 -bottom-2 bg-green-700 hover:bg-green-600 rounded-full text-white"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="size-4"
          >
            <path
              d="M7.493 18.5c-.425 0-.82-.236-.975-.632A7.48 7.48 0 0 1 6 15.125c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75A.75.75 0 0 1 15 2a2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23h-.777ZM2.331 10.727a11.969 11.969 0 0 0-.831 4.398 12 12 0 0 0 .52 3.507C2.28 19.482 3.105 20 3.994 20H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 0 1-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227Z"
            />
          </svg>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped></style>
