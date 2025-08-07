<script setup>
import { useForm } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

const props = defineProps({
  card: Object,
  color: String,
  editing: {
    type: Boolean,
    default: false,
  },
});

const wrapper = ref(null);

const classes = computed(() => {
  return `text-${props.color}-900 font-bold max-h-44 h-44 text-ellipsis text-balance text-base`;
});
const emit = defineEmits(['stopEditing']);

const editForm = useForm({
  column_id: props.card.column_id,
  text: props.card.text,
});

const update = (value) => {
  editForm.patch(
    `/boards/${props.card.board_id}/columns/${props.card.column_id}/cards/${props.card.id}`,
  );
  emit('stopEditing');
};
</script>

<template>
  <div ref="wrapper">
    <div v-if="!editing" :class="classes" data-testid="card-body-content">
      {{ card.text }}
    </div>
    <textarea
      data-testid="card-body-textarea"
      v-else
      v-focus
      @focusout="update"
      v-model="editForm.text"
      :class="`${classes} bg-transparent max-w-full border-none resize-none outline-hidden focus:ring-0 p-0`"
    />
  </div>
</template>

<style scoped></style>
