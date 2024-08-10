<script setup>
import { useForm } from '@inertiajs/vue3';
import { useActiveElement, useToggle } from '@vueuse/core';
import { onMounted, ref, watch, watchEffect } from 'vue';

import TextInput from '@/Components/TextInput.vue';

const { column } = defineProps({ column: Object });

const [isEditing, toggle] = useToggle();

const columnTitle = ref(null);

watchEffect(() => {
  if (columnTitle.value) {
    columnTitle.value.focus();
  }
});

const form = useForm({
  title: column.title,
});

const submit = () => {
  form.patch(`/boards/${column.board_id}/columns/${column.id}`, {
    onSuccess: () => {
      form.reset();
    },
  });
};
</script>

<template>
  <div class="p-4">
    <form @submit.prevent="submit" v-if="isEditing">
      <TextInput
        ref="columnTitle"
        @keyup.esc="isEditing = false"
        @keyup.enter="isEditing = false"
        @focusout="isEditing = false"
        v-focus
        v-model="form.title"
        type="text"
        class="w-full"
        data-testid="column-title-input"
      />
    </form>

    <h3
      v-else
      @click="toggle()"
      data-testid="column-title-header"
      class="text-2xl capitalize tracking-wider text-gray-500 px-3 font-bold hover:cursor-pointer m-1"
    >
      {{ column.title }}
    </h3>
  </div>
</template>
