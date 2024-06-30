<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {ref} from "vue";
import CreateBoardModal from "@/Pages/Boards/Components/CreateBoardModal.vue";
import Card from "@/Components/Card.vue";
import {Link} from '@inertiajs/vue3'

defineProps({boards: Array})

const showModal = ref(false);
</script>

<template>
    <AppLayout title="Retro Boards">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Retro Boards
            </h2>
        </template>
        <div class="pt-3 max-w-7xl mx-auto sm:px-6 lg:px-8" v-if="boards.length">
            <button
                type="button"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                @click="() => showModal = true"
            >
                Create a board
            </button>
        </div>
        <div class="" v-if="!boards.length">
            <div class="flex justify-center">
                <p class="text-lg">Uh oh...looks like you don't have any retro boards yet!</p>
            </div>
            <div class="flex justify-center pt-3">
                <button
                    type="button"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    @click="() => showModal = !showModal"
                >
                    Create a board
                </button>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-2 md:grid-cols-4 max-w-7xl mx-auto sm:px-6 lg:px-8 pt-3">
            <div v-for="board in boards" :key="board.id" class="">
                <Link :href="`/boards/${board.id}`">
                    <Card>
                        <div class="truncate">{{ board.title }}</div>
                        <span class="text-xs text-gray-500">Created {{ board.created_diff_for_humans }}</span>
                    </Card>
                </Link>
            </div>
        </div>
        <CreateBoardModal :show="showModal" @close="() => showModal = false"/>
    </AppLayout>
</template>
