import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './vendor/laravel/jetstream/**/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
      },
      colors: ({ colors }) => ({
        white: '#FAF9F7',
        // white: '#FFFAF7',
        whitest: '#FFFFFF',
        peach: {
          50: '#FFF8F5',
          100: '#FFF0E8',
          200: '#FFE0D1',
          300: '#FFD1BA',
          400: '#FFC0A3',
          500: '#FFB08C',
          600: '#E69E7D',
          700: '#CC8C6E',
          800: '#B37960',
          900: '#996752',
        },
        primary: {
          50: '#F3FBFA',
          100: '#E0F6F3',
          200: '#C1ECE8',
          300: '#A3E1DC',
          400: '#85D6D0',
          500: '#66CBC4',
          600: '#59B4AF',
          700: '#4B9D99',
          800: '#3D8683',
          900: '#306E6D',
        },
        gray: {
          50: '#FDFBFA', // very subtle off-white
          100: '#F8F4F2', // UI backgrounds, subtle fills
          200: '#EDE8E6', // borders, dividers
          300: '#DDD6D3', // muted text, outlines
          400: '#C2BAB7', // secondary text
          500: '#A89F9B', // neutral text
          600: '#8D8480', // active UI, headings
          700: '#726864', // strong UI text
          800: '#574E4A', // stronger contrast (headings, bold)
          900: '#3C3430', // highest contrast, primary text
        },
        red: {
          50: '#fef8f8',
          100: '#fdeeee',
          200: '#fbdcdc',
          300: '#f7c6c6',
          400: '#f3adad',
          500: '#e99a9a', // Very soft, muted pastel red
          600: '#d88484',
          700: '#bf6f6f',
          800: '#a85e5e',
          900: '#8d4b4b',
        },
        orange: {
          50: '#fef9f6',
          100: '#fff1e9',
          200: '#ffe3d1',
          300: '#ffd0b3',
          400: '#fcbf99',
          500: '#f2a985', // Soft pastel orange / apricot
          600: '#e19572',
          700: '#c57e5d',
          800: '#a7684c',
          900: '#8b543e',
        },
        amber: {
          50: '#fffcf5',
          100: '#fff7e3',
          200: '#ffebbe',
          300: '#ffe09c',
          400: '#ffd27c',
          500: '#f4be61', // Soft pastel amber / muted golden yellow
          600: '#e0a851',
          700: '#c19144',
          800: '#a47a3a',
          900: '#896330',
        },
        yellow: {
          50: '#fffdf7',
          100: '#fffbe5',
          200: '#fff6c7',
          300: '#ffeea3',
          400: '#ffe57e',
          500: '#f8d867', // Soft pastel yellow / buttercream
          600: '#e4c255',
          700: '#c7a947',
          800: '#a8903c',
          900: '#8c7832',
        },
        lime: {
          50: '#fafdf7',
          100: '#f3fbe6',
          200: '#e4f5c4',
          300: '#d2eda0',
          400: '#bedf80',
          500: '#a7cd68', // Soft pastel lime / pistachio green
          600: '#92b85a',
          700: '#7b9f4d',
          800: '#678643',
          900: '#566e39',
        },
        green: {
          50: '#f6fcf9',
          100: '#e9f8f0',
          200: '#d2f1df',
          300: '#b8e6cc',
          400: '#9fd9b7',
          500: '#86caa2', // Soft sage / pastel green
          600: '#73b390',
          700: '#60997b',
          800: '#507f68',
          900: '#426855',
        },
        emerald: {
          50: '#f4fbf8',
          100: '#e4f7f0',
          200: '#c7ecdf',
          300: '#a6e0cc',
          400: '#87d2b7',
          500: '#6bc3a3', // Soft pastel emerald / jade
          600: '#59af91',
          700: '#49997c',
          800: '#3c8169',
          900: '#316a57',
        },
        teal: {
          50: '#f3fbfb',
          100: '#e2f7f6',
          200: '#c4efee',
          300: '#a3e3e1',
          400: '#83d3d2',
          500: '#6ac2c1', // Soft pastel teal / ocean mist
          600: '#58adae',
          700: '#489797',
          800: '#3b7f7f',
          900: '#316a6a',
        },
        cyan: {
          50: '#f4fcfd',
          100: '#e1f8fb',
          200: '#c3f0f6',
          300: '#a2e4f0',
          400: '#7fd6e9',
          500: '#67c5dd',
          600: '#56adc4',
          700: '#4795a8',
          800: '#3b7d8d',
          900: '#316771',
        },
        sky: {
          50: '#f6fcfe',
          100: '#e7f7fc',
          200: '#ccecf7',
          300: '#aedff1',
          400: '#8ccfeb',
          500: '#6ebee3',
          600: '#5aa8ca',
          700: '#4b91ad',
          800: '#3e7a92',
          900: '#346577',
        },
        blue: {
          50: '#f6faff',
          100: '#e6f1fd',
          200: '#cddff8',
          300: '#b0cbf0',
          400: '#91b5e6',
          500: '#7ba2da',
          600: '#678ec1',
          700: '#5679a3',
          800: '#476786',
          900: '#3b556f',
        },
        indigo: {
          50: '#f8f9fd',
          100: '#eceef9',
          200: '#d8dbf2',
          300: '#c1c5ea',
          400: '#a9acdf',
          500: '#9697d3',
          600: '#807fc0',
          700: '#6b6ba6',
          800: '#595a8a',
          900: '#4a4a72',
        },
        violet: {
          50: '#fbf9fe',
          100: '#f3eefc',
          200: '#e4d8f7',
          300: '#d2c0f0',
          400: '#bfa5e8',
          500: '#ad90de',
          600: '#977bcc',
          700: '#8068af',
          800: '#6b5693',
          900: '#584678',
        },
        purple: {
          50: '#fcf8fe',
          100: '#f4ecfa',
          200: '#e5d6f3',
          300: '#d5beea',
          400: '#c3a5e0',
          500: '#b18fd4',
          600: '#9b79be',
          700: '#8566a3',
          800: '#70548a',
          900: '#5c4571',
        },
        fuchsia: {
          50: '#fef9fc',
          100: '#faedf5',
          200: '#f3d3ea',
          300: '#e9b5db',
          400: '#de99cb',
          500: '#cf83b9',
          600: '#b56fa3',
          700: '#995e8a',
          800: '#7f4e73',
          900: '#683f5d',
        },
        pink: {
          50: '#fef9fa',
          100: '#fceef2',
          200: '#f9d7e1',
          300: '#f3bccd',
          400: '#eca1b9',
          500: '#e38eaa',
          600: '#ca7995',
          700: '#ac677f',
          800: '#905568',
          900: '#774454',
        },
        rose: {
          50: '#fef8f9',
          100: '#fcebee',
          200: '#f8d2d7',
          300: '#f1b5bd',
          400: '#e996a3',
          500: '#de8492',
          600: '#c9717f',
          700: '#aa5f6a',
          800: '#8f4e58',
          900: '#764047',
        },
      }),
    },
  },
  safelist: [
    {
      pattern: /bg-[a-z]*-[0-9]*/,
    },
    {
      pattern: /border-[a-z]*-[0-9]*/,
    },
    {
      pattern: /text-[a-z]*-[0-9]*/,
    },
  ],

  plugins: [forms, typography],
};
