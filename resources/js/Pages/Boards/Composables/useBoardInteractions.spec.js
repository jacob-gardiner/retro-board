import { useForm } from '@inertiajs/vue3';
import { describe, it } from 'vitest';

import { useBoardInteractions } from '@/Pages/Boards/Composables/useBoardInteractions.js';

vi.mock('@inertiajs/vue3', () => {
  const patch = vi.fn();
  const column_id = null;
  return {
    useForm: vi.fn(() => ({
      patch,
      column_id,
    })),
  };
});

const column = { id: 321, title: 'Some Title' };
const card = {
  id: 123,
  board_id: 432,
  column_id: column.id,
  text: 'Some Title',
};
describe('useBoardInteractions', () => {
  beforeEach(() => {
    vi.restoreAllMocks();
  });
  describe('focusColumn', () => {
    it('can update the focused column', () => {
      const { focusedColumn, updateFocusedColumn } = useBoardInteractions();

      updateFocusedColumn(column);

      expect(focusedColumn.value).toEqual(column);
    });
  });

  describe('draggingCard', () => {
    it('can update the dragging card', () => {
      const { draggingCard, updateDraggingCard } = useBoardInteractions();

      updateDraggingCard(card);

      expect(draggingCard.value).toEqual(card);
    });
  });

  describe('dropCard', () => {
    it('sends an update request when a card is dropped on a column', () => {
      const { updateDraggingCard, updateFocusedColumn, dropCard } =
        useBoardInteractions();
      const form = useForm({});

      updateDraggingCard(card);
      updateFocusedColumn(column);

      dropCard();

      expect(form.patch).toHaveBeenCalledWith(
        `/boards/${card.board_id}/columns/${card.column_id}/cards/${card.id}`,
        expect.anything(),
      );
    });

    it('does not send an update request when a card is dropped without a focused column', () => {
      const { updateDraggingCard, updateFocusedColumn, dropCard } =
        useBoardInteractions();
      const form = useForm({});

      updateDraggingCard(card);
      updateFocusedColumn(null);

      dropCard();

      expect(form.patch).not.toHaveBeenCalled();
    });
  });
});
