<script setup>
import { useForm } from '@inertiajs/vue3';
import { useTimeoutPoll } from '@vueuse/core';
import { Pause, Play, RotateCcw } from 'lucide-vue-next';
import { DateTime } from 'luxon';
import { computed, ref, watch } from 'vue';

const props = defineProps({ board: Object });

const timeRemaining = ref(props.board.timer_duration_remaining);
const isPaused = computed(() => {
  return !props.board.timer_started_at;
});

watch(
  () => `${props.board.timer_duration_remaining}`,
  () => {
    timeRemaining.value = props.board.timer_duration_remaining;
  },
);

const calculateTimeRemaining = async () => {
  timeRemaining.value =
    props.board.timer_duration_remaining -
    (DateTime.now().toUnixInteger() -
      DateTime.fromISO(props.board.timer_started_at).toUnixInteger());
};
const { resume, pause } = useTimeoutPoll(calculateTimeRemaining, 1000);

const form = useForm({
  timer_started_at: props.board.timer_started_at,
  timer_duration: props.board.timer_duration,
  timer_duration_remaining: props.board.timer_duration_remaining,
});

const resetTimerForm = useForm({
  timer_started_at: null,
  timer_duration: props.board.timer_duration,
  timer_duration_remaining: props.board.timer_duration,
});

const resetTimer = () => {
  resetTimerForm.put(`/boards/${props.board.id}`, {
    onSuccess: () => {
      form.timer_duration_remaining = props.board.timer_duration;
    },
  });
};
const timerClick = () => {
  if (isPaused.value) {
    form.timer_started_at = DateTime.now().toISO();

    form.put(`/boards/${props.board.id}`);
    return;
  }
  form.timer_started_at = null;
  form.timer_duration_remaining = Math.floor(timeRemaining.value);

  form.put(`/boards/${props.board.id}`);
};

const formattedTimeRemaining = computed(() => {
  const minutes = Math.floor(timeRemaining.value / 60);
  const seconds = Math.floor(timeRemaining.value % 60);

  const formattedMinutes = String(minutes).padStart(2, '0');
  const formattedSeconds = String(seconds).padStart(2, '0');

  return `${formattedMinutes}:${formattedSeconds}`;
});

watch(
  isPaused,
  (currentlyPaused, wasPaused) => {
    if (wasPaused === undefined && currentlyPaused) return;

    if (currentlyPaused) {
      pause();
    } else {
      resume();
    }
  },
  { immediate: true },
);
</script>

<template>
  <div class="flex">
    <span class="text-xl font-bold mr-3 w-16">{{
      formattedTimeRemaining
    }}</span>
    <form @submit.prevent="timerClick" data-testid="toggle-timer">
      <button
        type="submit"
        class="text-indigo-950 hover:text-indigo-700 text-center h-full flex justify-center flex-col mr-2"
      >
        <Play v-if="isPaused" data-testid="play-icon" :size="20" />
        <Pause v-else data-testid="pause-icon" :size="20" />
      </button>
    </form>
    <form
      @submit.prevent="resetTimer"
      data-testid="toggle-timer"
      v-if="isPaused"
    >
      <button
        type="submit"
        class="text-indigo-950 hover:text-indigo-700 h-full flex justify-center flex-col"
      >
        <RotateCcw data-testid="reset-icon" :size="20" />
      </button>
    </form>
  </div>
</template>
