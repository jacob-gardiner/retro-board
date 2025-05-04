import { useForm } from '@inertiajs/vue3';
import { mount } from '@vue/test-utils';
import { useTimeoutPoll } from '@vueuse/core';
import { useSound } from '@vueuse/sound';
import { DateTime } from 'luxon';

import BoardTimer from '@/Pages/Boards/Components/BoardTimer.vue';

import timerFinishedSound from '../../../../sounds/vinyl-rewind.mp3';

vi.mock('@inertiajs/vue3', () => {
  const put = vi.fn();
  const useForm = vi.fn().mockImplementation((args) => ({
    ...args,
    put,
    errors: {},
  }));

  return {
    useForm,
  };
});

vi.mock('@vueuse/core', () => {
  const pause = vi.fn();
  const resume = vi.fn();
  const useTimeoutPoll = vi.fn().mockImplementation((args) => ({
    ...args,
    pause,
    resume,
  }));

  return {
    useTimeoutPoll,
  };
});

vi.mock('@vueuse/sound', () => {
  const play = vi.fn();
  const useSound = vi.fn().mockImplementation((args) => ({
    ...args,
    play,
  }));

  return {
    useSound,
  };
});

const board = {
  id: 2,
  team_id: 2,
  title: 'Some Board',
  created_by: 1,
  created_diff_for_humans: '3 days ago',
  timer_started_at: null,
  timer_duration: 300,
  timer_duration_remaining: 300,
  created_at: '2025-04-25T15:31:48.000000Z',
  updated_at: '2025-04-25T15:31:48.000000Z',
  columns: [],
};

describe('BoardTimer', () => {
  it('updates the board when the start button is clicked', async () => {
    const form = useForm({});
    const { resume } = useTimeoutPoll(() => {}, 1000);

    const wrapper = mount(BoardTimer, {
      props: {
        board,
      },
    });
    expect(resume).toHaveBeenCalledTimes(0);

    expect(wrapper.find('[data-testid=pause-icon]').exists()).toBeFalsy();
    expect(wrapper.find('[data-testid=play-icon]').exists()).toBeTruthy();

    await wrapper.find('[data-testid=toggle-timer]').trigger('submit.prevent');

    expect(form.put).toHaveBeenCalledWith(`/boards/${board.id}`);
  });

  it('starts the countdown when timer_started_at is set on the board', async () => {
    const form = useForm({});
    const { resume, pause } = useTimeoutPoll(() => {}, 1000);

    const wrapper = mount(BoardTimer, {
      props: {
        board: {
          ...board,
          timer_started_at: DateTime.now().toISO(),
        },
      },
    });

    expect(wrapper.find('[data-testid=play-icon]').exists()).toBeFalsy();
    expect(wrapper.find('[data-testid=pause-icon]').exists()).toBeTruthy();

    expect(resume).toHaveBeenCalledTimes(1);
    expect(pause).toHaveBeenCalledTimes(0);

    await wrapper.find('[data-testid=toggle-timer]').trigger('submit.prevent');

    expect(form.put).toHaveBeenCalledWith(`/boards/${board.id}`);
  });

  it('plays a sound when the timer is done', () => {
    const { play } = useSound(timerFinishedSound);

    mount(BoardTimer, {
      props: {
        board: {
          ...board,
          timer_started_at: DateTime.now().toISO(),
          timer_duration_remaining: 0,
        },
      },
    });

    expect(play).toHaveBeenCalled();
  });

  it('resets the timer when finished', () => {
    const form = useForm({});

    mount(BoardTimer, {
      props: {
        board: {
          ...board,
          timer_started_at: DateTime.now().toISO(),
          timer_duration_remaining: 0,
        },
      },
    });

    expect(form.put).toHaveBeenCalledWith(
      `/boards/${board.id}`,
      expect.anything(),
    );
  });
});
