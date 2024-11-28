<script setup>
defineProps({ card: Object, color: String, name: String });
</script>

<template>
  <div :class="`text-${color}-900 font-bold h-28 text-ellipsis`">
    {{ card.text }}
  </div>
</template>

<style scoped></style>
