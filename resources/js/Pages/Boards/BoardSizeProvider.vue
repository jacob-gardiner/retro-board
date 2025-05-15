<script setup>
import { provide, ref } from 'vue';

const el = ref(null);

const height = ref(window.innerHeight);

provide('pageDetails', {
  height,
});
</script>

<template>
  <div ref="el" class="grow">
    <slot />
  </div>
</template>

<style scoped></style>
