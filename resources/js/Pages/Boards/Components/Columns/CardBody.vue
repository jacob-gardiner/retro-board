<script setup>
defineProps({ card: Object, color: String, name: String });
</script>

<template>
  <div
    :class="`text-${color}-900 font-bold max-h-44 h-44 text-ellipsis text-balance text-base`"
  >
    {{ card.text }}
  </div>
</template>

<style scoped></style>
