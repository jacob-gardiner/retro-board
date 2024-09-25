import { mount } from '@vue/test-utils';
import { nextTick, ref } from 'vue';

import Column from '@/Pages/Boards/Components/Columns/Column.vue';
import RetroCard from '@/Pages/Boards/Components/Columns/RetroCard.vue';

const user = {
  id: 879,
  name: 'Rick Sanchez',
  color: 'green',
};

const card = {
  id: 123,
  board_id: 321,
  column_id: 1,
  text: 'Some happy little text',
  created_at: '2024-06-30T18:45:22.000000Z',
  updated_at: '2024-06-30T18:45:22.000000Z',
  deleted_at: '2024-06-30T18:45:22.000000Z',
  user,
};
const column = {
  id: 1,
  board_id: 1,
  title: 'example',
  created_at: '2024-06-30T18:45:22.000000Z',
  updated_at: '2024-06-30T18:45:22.000000Z',
  cards: [card],
};

describe('Column', () => {
  it('shows the title', () => {
    const wrapper = mount(Column, {
      props: {
        column,
      },
      global: {
        provide: {
          draggingCard: {
            draggingCard: {},
          },
          focusedColumn: {
            updateFocusedColumn: vi.fn(),
            focusedColumn: ref(null),
          },
        },
      },
    });

    expect(wrapper.html()).toContain(column.title);
  });

  it('renders the cards with expected props', () => {
    const wrapper = mount(Column, {
      props: {
        column,
      },
      global: {
        provide: {
          draggingCard: {
            draggingCard: {},
          },
          focusedColumn: {
            updateFocusedColumn: vi.fn(),
            focusedColumn: ref(null),
          },
        },
      },
    });
    const retroCard = wrapper.findComponent(RetroCard);

    expect(retroCard.exists()).toBeTruthy();
    expect(retroCard.props().card).toEqual(card);
    expect(retroCard.props().color).toEqual(user.color);
    expect(retroCard.props().name).toEqual(user.name);
  });

  it('updates styles when dragging a card and hovering over another column', async () => {
    const wrapper = mount(Column, {
      props: {
        column,
      },
      global: {
        provide: {
          draggingCard: {
            draggingCard: ref(card),
          },
          focusedColumn: {
            updateFocusedColumn: vi.fn(),
            focusedColumn: ref({ ...column, id: 42 }),
          },
        },
      },
    });

    await nextTick();
    expect(
      wrapper.find(`[data-testid=column-${column.id}]`).classes(),
    ).toContain('opacity-50');
  });

  it('does not update styles when hovering over the column without dragging a card', async () => {
    const wrapper = mount(Column, {
      props: {
        column,
      },
      global: {
        provide: {
          draggingCard: {
            draggingCard: ref(null),
          },
          focusedColumn: {
            updateFocusedColumn: vi.fn(),
            focusedColumn: ref({ ...column, id: 42 }),
          },
        },
      },
    });

    await nextTick();
    expect(
      wrapper.find(`[data-testid=column-${column.id}]`).classes(),
    ).not.toContain('opacity-50 bg-gray-50');
  });
});
