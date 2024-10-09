import { mount } from '@vue/test-utils';
import { nextTick } from 'vue';

import RetroCard from '@/Pages/Boards/Components/Columns/RetroCard.vue';

describe('RetroCard', () => {
  it('renders the card details', async () => {
    const color = 'red';
    const name = 'Rick Sanchez';
    const card = {
      text: 'Some happy little text',
    };

    const wrapper = mount(RetroCard, {
      global: {
        provide: {
          draggingCard: {
            updateDraggingCard: () => {},
            dropCard: () => {},
          },
        },
      },
      props: {
        card,
        color,
        name,
      },
    });

    expect(wrapper.text()).toContain(name);
    expect(wrapper.text()).toContain(card.text);
    expect(wrapper.html()).toContain(`bg-${color}`);
    expect(wrapper.html()).toContain(`text-${color}`);
  });

  it('renders another card when clicking and dragging a card', async () => {
    const color = 'red';
    const name = 'Rick Sanchez';
    const card = {
      id: 42,
      text: 'Some happy little text',
    };

    const updateDraggingCard = vi.fn();
    const dropCard = vi.fn();

    const wrapper = mount(RetroCard, {
      global: {
        provide: {
          draggingCard: {
            updateDraggingCard,
            dropCard,
          },
        },
      },
      props: {
        card,
        color,
        name,
      },
    });

    await wrapper
      .find(`[data-testid=retroCard-${card.id}]`)
      .trigger('mousedown');

    await nextTick();

    expect(
      wrapper.find(`[data-testid=retroCard-dragging-${card.id}]`).exists(),
    ).toBeTruthy();
    expect(updateDraggingCard).toHaveBeenCalledWith(card);
  });
});
