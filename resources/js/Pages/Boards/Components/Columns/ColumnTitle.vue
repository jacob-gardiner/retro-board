<script setup>
import { useForm } from '@inertiajs/vue3';
import { useToggle } from '@vueuse/core';

import TextInput from '@/Components/TextInput.vue';

const { column } = defineProps({ column: Object });

const [isEditing, toggle] = useToggle();

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
        @keyup.esc="toggle()"
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
