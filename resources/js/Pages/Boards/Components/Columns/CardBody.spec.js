import { useForm } from '@inertiajs/vue3';
import { mount } from '@vue/test-utils';

import CardBody from '@/Pages/Boards/Components/Columns/CardBody.vue';

vi.mock('@inertiajs/vue3', () => {
  const patch = vi.fn();
  const useForm = vi.fn().mockImplementation((args) => ({
    ...args,
    patch,
    errors: {},
  }));

  return {
    useForm,
  };
});

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
const defaultProps = {
  card,
  color: 'red',
  editing: false,
};

describe('CardBody', () => {
  it('shows the text content of the card', () => {
    const wrapper = mount(CardBody, {
      props: defaultProps,
    });

    expect(
      wrapper.find('[data-testid="card-body-textarea"]').exists(),
    ).toBeFalsy();
    expect(wrapper.find('[data-testid="card-body-content"]').text()).toEqual(
      card.text,
    );
  });

  it('shows a textarea when editing', () => {
    const wrapper = mount(CardBody, {
      props: {
        ...defaultProps,
        editing: true,
      },
    });

    expect(
      wrapper.find('[data-testid="card-body-content"]').exists(),
    ).toBeFalsy();
    expect(wrapper.find('[data-testid="card-body-textarea"]')).toBeTruthy();
  });

  it('submit the edit form when the textarea loses focus', async () => {
    const form = useForm({});

    const wrapper = mount(CardBody, {
      props: {
        ...defaultProps,
        editing: true,
      },
    });

    const textarea = wrapper.find('[data-testid="card-body-textarea"]');

    await textarea.setValue('updated text');

    await textarea.trigger('focusout');

    expect(form.patch).toHaveBeenCalledTimes(1);
    expect(form.patch).toHaveBeenCalledWith(
      `/boards/${card.board_id}/columns/${card.column_id}/cards/${card.id}`,
    );

    expect(Object.keys(wrapper.emitted())).toContain('stopEditing');
  });
});
