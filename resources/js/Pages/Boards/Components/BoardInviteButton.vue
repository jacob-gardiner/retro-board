<script setup>
import { useClipboard } from '@vueuse/core';
import { CheckCircle, Copy } from 'lucide-vue-next';

const { url } = defineProps({
  url: String,
});

const { copy, copied } = useClipboard({
  copiedDuring: 3000,
});

const copyUrl = () => copy(url);
</script>

<template>
  <div class="flex items-start">
    <Transition
      mode="out-in"
      enter-active-class="transition ease-out duration-200"
      enter-from-class="opacity-0 scale-90"
      enter-to-class="opacity-100 scale-100"
      leave-active-class="transition ease-in duration-150"
      leave-from-class="opacity-100 scale-100"
      leave-to-class="opacity-0 scale-90"
    >
      <span
        v-if="copied"
        class="text-xs text-green-800 self-center"
        data-testid="copy-success-message"
      >
        Invite link copied
      </span>
    </Transition>
    <button
      title="Copy Invite Link"
      type="submit"
      class="relative text-gray-800 hover:text-primary-700 text-center h-full flex justify-center flex-col ml-2"
      @click="copyUrl"
    >
      <Transition
        mode="out-in"
        enter-active-class="transition ease-out duration-200"
        enter-from-class="opacity-0 scale-90"
        enter-to-class="opacity-100 scale-100"
        leave-active-class="transition ease-in duration-150"
        leave-from-class="opacity-100 scale-100"
        leave-to-class="opacity-0 scale-90"
      >
        <CheckCircle
          v-if="copied"
          key="check"
          class="text-green-800"
          data-testid="copy-success-icon"
          :size="20"
        />
        <Copy v-else key="copy" data-testid="copy-icon" :size="20" />
      </Transition>
    </button>
  </div>
</template>

<style scoped></style>
