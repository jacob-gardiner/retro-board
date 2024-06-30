<script setup>

import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import {useForm} from "@inertiajs/vue3";

const {boardId} = defineProps({boardId: Number})

const form = useForm({
    title: null,
});

const submit = () => {
    form.post(`/boards/${boardId}/columns`, {
        onSuccess: () => {
            form.reset()
        }
    });
}

</script>

<template>
    <form @submit.prevent="submit">
        <InputLabel for="title" class="hidden">Title</InputLabel>
        <TextInput v-model="form.title" name="title" placeholder="What went well?" class="w-full" />
        <InputError v-if="form.errors?.title" :message="form.errors.title"/>
    </form>
</template>
