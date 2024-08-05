import { mount } from '@vue/test-utils';

import CreateColumn from '@/Pages/Boards/Components/Columns/CreateColumn.vue';
import RetroCard from '@/Pages/Boards/Components/Columns/RetroCard.vue';

describe('RetroCard', () => {
  it('renders the card details', async () => {
    const color = 'red';
    const name = 'Rick Sanchez';
    const card = {
      text: 'Some happy little text',
    };

    const wrapper = mount(RetroCard, {
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
});
