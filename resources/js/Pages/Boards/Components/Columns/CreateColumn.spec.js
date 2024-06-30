import {mount} from '@vue/test-utils'
import CreateColumn from "@/Pages/Boards/Components/Columns/CreateColumn.vue";
import {useForm} from "@inertiajs/vue3";

vi.mock('@inertiajs/vue3', () => {
    const post = vi.fn()
    const useForm = vi.fn().mockImplementation((args) => ({
        ...args,
        post,
        errors: {}
    }))

    return {
        useForm
    }
})

describe('CreateColumn', () => {
    it('posts to the API to create a column', async () => {
        const boardId = 1;

        const form = useForm({});

        const wrapper = mount(CreateColumn, {
            props: {
                boardId
            }
        })

        const input = wrapper.find('input')

        await input.setValue('What went well?')

        await wrapper.find('form').trigger('submit.prevent')

        expect(form.post).toHaveBeenCalledTimes(1)
        expect(form.post).toHaveBeenCalledWith(`/boards/${boardId}/columns`, expect.objectContaining({
            onSuccess: expect.anything()
        }))
    })
})
