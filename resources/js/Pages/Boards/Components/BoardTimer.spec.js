import { useForm } from '@inertiajs/vue3';
import { flushPromises, mount } from '@vue/test-utils';
import { useTimeoutPoll } from '@vueuse/core';
import { nextTick } from 'vue';

import BoardTimer from '@/Pages/Boards/Components/BoardTimer.vue';
import CreateColumn from '@/Pages/Boards/Components/Columns/CreateColumn.vue';

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
  it('can start and stop the timer', async () => {
    const form = useForm({});

    const wrapper = mount(BoardTimer, {
      props: {
        board,
      },
    });

    // start the timer
    await wrapper.find('[data-testid=toggle-timer]').trigger('submit.prevent');

    expect(form.put).toHaveBeenCalledWith(
      `/boards/${board.id}`,
      expect.anything(),
    );
    expect(wrapper.find('[data-testid=pause-icon]').exists()).toBeTruthy();
    expect(wrapper.find('[data-testid=play-icon]').exists()).toBeFalsy();

    // stop the timer
    await wrapper.find('[data-testid=toggle-timer]').trigger('submit.prevent');
    expect(form.put).toHaveBeenCalledTimes(2);
    expect(wrapper.find('[data-testid=play-icon]').exists()).toBeTruthy();
    expect(wrapper.find('[data-testid=pause-icon]').exists()).toBeFalsy();

    // TODO: add assertions for invoking functions from useTimeoutPoll
  });

  it.todo('starts the countdown if the timer is already started');

  it.todo('notifys the user when the timer is done');

  it.todo('resets the timer when finished');
});
