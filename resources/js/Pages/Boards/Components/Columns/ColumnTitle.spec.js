import { mount } from '@vue/test-utils';

import ColumnTitle from '@/Pages/Boards/Components/Columns/ColumnTitle.vue';

const column = {
  id: 1,
  board_id: 1,
  title: 'What went well?',
  created_at: '2024-07-31T19:58:19.000000Z',
  updated_at: '2024-07-31T19:58:19.000000Z',
  cards: [],
};

describe('ColumnTitle', () => {
  it('renders the title', () => {
    const wrapper = mount(ColumnTitle, {
      props: {
        column,
      },
    });

    expect(wrapper.text()).toContain(column.title);
  });

  it('renders an input when clicked', async () => {
    const wrapper = mount(ColumnTitle, {
      props: {
        column,
      },
    });

    await wrapper.find('[data-testid="column-title-header"]').trigger('click');

    expect(
      wrapper.find('[data-testid="column-title-input"]').exists(),
    ).toBeTruthy();
  });
});
