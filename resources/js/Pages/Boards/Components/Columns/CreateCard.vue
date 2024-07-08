<script setup>
import TextInput from "@/Components/TextInput.vue";
import {useForm} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";

const {boardId, columnId} = defineProps({boardId: Number, columnId: Number})

const form = useForm({
    text: null,
});

const submit = () => {
    form.post(`/boards/${boardId}/columns/${columnId}/cards`, {
        onSuccess: () => {
            form.reset()
        }
    });
}

</script>

<template>
    <div class="bottom-0 bg-white p-3 border-t-2 border-indigo-700 rounded-t-lg w-11/12 h-20">
        <form @submit.prevent="submit">
            <TextInput
                v-model="form.text"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                rows="3"
                placeholder="Enter text here"
                minlength="3"
                maxlength="255"
            ></TextInput>
            <InputError v-if="form.errors?.text" :message="form.errors.text"/>
        </form>
    </div>
</template>
