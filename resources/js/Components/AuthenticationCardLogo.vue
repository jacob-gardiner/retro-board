<script setup>
import { Link } from '@inertiajs/vue3';
import { Disc3 } from 'lucide-vue-next';
</script>

<template>
  <Link :href="'/'">
    <Disc3 :size="48" class="text-primary-700 w-16 h-16" />
  </Link>
</template>
