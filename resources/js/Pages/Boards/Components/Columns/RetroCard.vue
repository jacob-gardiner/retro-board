<script setup>
const { card } = defineProps({ card: Object, color: String, name: String });
</script>

<template>
  <div :class="`p-3 rounded shadow mb-2 mx-2 w-28 bg-${color}-100`">
    <div :class="`text-${color}-900 font-bold h-28 text-ellipsis`">
      {{ card.text }}
    </div>
    <span :class="`text-xs text-right w-full text-${color}-700`">{{
      name
    }}</span>
  </div>
</template>

<style scoped></style>
