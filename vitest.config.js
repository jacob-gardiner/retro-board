import path from 'path';
import { defineConfig } from 'vitest/config';

import Vue from '@vitejs/plugin-vue';

export default defineConfig({
  plugins: [Vue()],
  test: {
    globals: true,
    setupFiles: './../../vitest.setup.js',
    environment: 'jsdom',
  },

  root: path.resolve(__dirname, './resources/js'),

  resolve: {
    alias: {
      '@': path.resolve(__dirname, './resources/js'),
    },
  },
});
