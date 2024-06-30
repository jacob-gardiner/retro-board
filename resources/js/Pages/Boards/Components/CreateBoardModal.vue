<script setup>
import {reactive, ref} from "vue";
import Modal from "@/Components/Modal.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SectionTitle from "@/Components/SectionTitle.vue";
import FormSection from "@/Components/FormSection.vue";
import {router} from "@inertiajs/vue3";

defineProps({show: Boolean})
const emit = defineEmits(['close'])

import { useForm } from '@inertiajs/vue3'
import InputError from "@/Components/InputError.vue";

const form = useForm({
    title: null,
})

const submit = () => {
    form.post('/boards', {
        onSuccess: () => {
            form.reset()
            emit('close')
        }
    })
}

</script>

<template>
    <Modal :show="show" @close="$emit('close')" max-width="sm">
        <form @submit.prevent="submit">
            <InputLabel for="title">Title</InputLabel>
            <TextInput v-model="form.title" name="title" placeholder="Some sweet retro" class="w-full"/>
            <InputError v-if="form.errors.title" :message="form.errors.title"/>
            <div class="flex justify-end pt-3">
                <PrimaryButton :disabled="form.processing">Create</PrimaryButton>
            </div>
        </form>
    </Modal>
</template>
