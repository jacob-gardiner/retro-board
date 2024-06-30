<script setup>
const {column} = defineProps({column: Object})
</script>

<template>
    <div class="">
        <h3 class="text-2xl capitalize tracking-wider text-gray-500 px-3">
            {{ column.title }}
        </h3>
    </div>
</template>
