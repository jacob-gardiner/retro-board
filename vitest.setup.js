import { config } from '@vue/test-utils';

config.global.directives = {
  focus: {
    mounted(el) {
      el.focus();
    },
  },
};
