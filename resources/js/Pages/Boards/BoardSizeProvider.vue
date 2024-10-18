<script setup>
import { useElementSize } from '@vueuse/core';
import { provide, ref } from 'vue';

const el = ref(null);
const { height } = useElementSize(el);

provide('pageDetails', {
  height,
});
</script>

<template>
  <div ref="el" class="grow">
    {{ height }}
    <slot />
  </div>
</template>

<style scoped></style>
