import { mount } from '@vue/test-utils';
import { nextTick, ref } from 'vue';
import { beforeEach, describe, expect, it, vi } from 'vitest';

import BoardInviteButton from './BoardInviteButton.vue';

const copyMock = vi.fn();
const copiedRef = ref(false);

vi.mock('@vueuse/core', () => ({
  useClipboard: vi.fn(() => ({
    copy: copyMock,
    copied: copiedRef,
  })),
}));

const mountComponent = (props = {}) =>
  mount(BoardInviteButton, {
    props: {
      url: 'https://example.com/invite',
      ...props,
    },
    global: {
      stubs: {
        Transition: { template: '<slot />' },
        Copy: true,
        CheckCircle: true,
      },
    },
  });

describe('BoardInviteButton', () => {
  beforeEach(() => {
    copyMock.mockReset();
    copiedRef.value = false;
  });

  it('copies the provided url when clicked', async () => {
    const wrapper = mountComponent();

    await wrapper.find('button').trigger('click');

    expect(copyMock).toHaveBeenCalledWith('https://example.com/invite');
  });

  it('shows the copy icon when nothing has been copied', () => {
    const wrapper = mountComponent();

    expect(wrapper.find('[data-testid="copy-icon"]').exists()).toBe(true);
    expect(wrapper.find('[data-testid="copy-success-icon"]').exists()).toBe(
      false,
    );
    expect(wrapper.find('[data-testid="copy-success-message"]').exists()).toBe(
      false,
    );
  });

  it('shows the success icon and message when the url has been copied', async () => {
    const wrapper = mountComponent();

    copiedRef.value = true;
    await nextTick();

    expect(wrapper.find('[data-testid="copy-icon"]').exists()).toBe(false);
    expect(wrapper.find('[data-testid="copy-success-icon"]').exists()).toBe(
      true,
    );
    expect(wrapper.find('[data-testid="copy-success-message"]').text()).toBe(
      'Invite link copied',
    );
  });
});
