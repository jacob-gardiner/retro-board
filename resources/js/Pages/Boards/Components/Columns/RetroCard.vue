<script setup>
const { card } = defineProps({ card: Object });
</script>

<template>
  <div
    class="p-3 rounded shadow mb-2 mx-2 w-48 bg-indigo-100 text-indigo-900 font-bold"
  >
    {{ card.text }}
  </div>
</template>

<style scoped></style>
