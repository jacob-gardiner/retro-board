import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

export const useBoardInteractions = () => {
  const focusedColumn = ref(null);
  const updateFocusedColumn = (column) => {
    focusedColumn.value = column;
  };

  const draggingCard = ref(null);
  const updateDraggingCard = (card) => {
    draggingCard.value = card;
  };
  const form = useForm({
    column_id: draggingCard.value?.column_id,
    text: draggingCard.value?.text,
  });

  const dropCard = () => {
    if (!focusedColumn.value?.id) return;

    form.column_id = focusedColumn.value.id;
    form.text = draggingCard.value.text;

    form.patch(
      `/boards/${draggingCard.value?.board_id}/columns/${draggingCard.value?.column_id}/cards/${draggingCard.value?.id}`,
      {
        onSuccess: () => {
          form.reset();
        },
      },
    );
  };

  return {
    focusedColumn,
    updateFocusedColumn,
    draggingCard,
    updateDraggingCard,
    dropCard,
  };
};
