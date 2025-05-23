<script setup>
import { useForm } from '@inertiajs/vue3';
import { useMouseInElement, usePointer } from '@vueuse/core';
import { ThumbsUp, X } from 'lucide-vue-next';
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

const upVoteForm = useForm({});
const deleteForm = useForm({});

const onVote = () => {
  upVoteForm.post(`/cards/${props.card.id}/votes`, {
    onSuccess: () => {
      upVoteForm.reset();
    },
  });
};

const onDelete = () => {
  deleteForm.delete(
    `/boards/${props.card.board_id}/columns/${props.card.column_id}/cards/${props.card.id}`,
    {
      onSuccess: () => {
        deleteForm.reset();
      },
    },
  );
};
</script>

<template>
  <div class="w-full flex justify-around">
    <div
      v-if="isDragging"
      :class="`p-3 rounded cursor-grabbing rotate-12 fixed z-50 shadow-md mb-2 mx-2 w-48 bg-${color}-100`"
      :data-testid="`retroCard-dragging-${card.id}`"
      ref="el"
      :style="style"
    >
      <CardBody :card="card" :color="color" :name="name" />
    </div>
    <div ref="cardInteractionZone">
      <div class="relative">
        <div
          @mousedown.left="dragStart"
          :data-testid="`retroCard-${card.id}`"
          :class="`p-2 rounded shadow cursor-grab w-48  ${isDragging ? `shadow-inner opacity-75 backdrop-blur-md bg-${color}-100/30` : `bg-${color}-100`}`"
        >
          <CardBody :card="card" :color="color" :name="name" />
          <div class="grid grid-cols-2">
            <span :class="`text-xs w-full text-${color}-700`">{{ name }}</span>
            <span :class="`text-${color}-900 w-full text-right`">{{
              card.votes?.length
            }}</span>
          </div>
        </div>
        <div
          v-if="!isOutside"
          @click="onVote"
          class="absolute cursor-pointer p-2 -right-1.5 -bottom-1.5 bg-primary-700 hover:bg-primary-600 rounded-full text-white"
        >
          <ThumbsUp size="22" />
        </div>
        <div
          v-if="!isOutside && $page.props.auth.user.id === card.user.id"
          @click="onDelete"
          class="absolute cursor-pointer p-2 -right-1.5 -top-1.5 bg-red-700 hover:bg-red-600 rounded-full text-white"
        >
          <X size="22" />
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped></style>
