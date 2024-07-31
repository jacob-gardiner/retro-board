import { mount } from '@vue/test-utils';

import Column from '@/Pages/Boards/Components/Columns/Column.vue';

const column = {
  id: 1,
  board_id: 1,
  title: 'example',
  created_at: '2024-06-30T18:45:22.000000Z',
  updated_at: '2024-06-30T18:45:22.000000Z',
};

describe('Column', () => {
  it('shows the title', () => {
    const wrapper = mount(Column, {
      props: {
        column,
      },
    });

    expect(wrapper.html()).toContain(column.title);
  });
});
