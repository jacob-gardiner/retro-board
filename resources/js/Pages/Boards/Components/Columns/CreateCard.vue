<script setup>
import { useForm } from '@inertiajs/vue3';

import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';

const { boardId, columnId } = defineProps({
  boardId: Number,
  columnId: Number,
});

const form = useForm({
  text: null,
});

const submit = () => {
  form.post(`/boards/${boardId}/columns/${columnId}/cards`, {
    onSuccess: () => {
      form.reset();
    },
  });
};
</script>

<template>
  <div
    class="bg-white p-3 border-t-2 border-primary-700 rounded-t-lg h-20 shadow-md"
  >
    <form @submit.prevent="submit">
      <TextInput
        v-model="form.text"
        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
        rows="3"
        placeholder="Enter text here"
        minlength="3"
        maxlength="140"
      ></TextInput>
      <InputError v-if="form.errors?.text" :message="form.errors.text" />
    </form>
  </div>
</template>
