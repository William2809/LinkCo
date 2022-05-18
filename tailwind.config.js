// const { fontSize, letterSpacing } = require('tailwindcss/defaultTheme');
const { lime } = require('tailwindcss/colors');
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Poppins', ...defaultTheme.fontFamily.sans],
        // 'sans': ['Nunito', ...defaultTheme.fontFamily.sans],
      },
    },

    colors: {
      green: {
        100: '#F2F7F6',
        200: '#D3E4DE',
        300: '#B3D1C6',
        400: '#93BDAF',
        500: '#73AA97',
        600: '#59927E',
        700: '#457263',
        800: '#325247',
        900: '#1F332C',
      },
      lime: {
        100: '#DBFCCF',
        200: '#B8F8A0',
        300: '#98F576',
        400: '#70F141',
        500: '#4CEE11',
        600: '#3DBE0E',
        700: '#2E8F0A',
        800: '#1F5F07',
        900: '#0F3003',
      }
    },

    fontSize: {
      "body": "1.0625rem",
      "heading6": "1.25rem",
      "heading5": "1.5rem",
      "heading4": "1.8125rem",
      "heading3": "2.5625rem",
      "heading2": '3.125rem',
      "heading1": ['3.5rem', { lineHeight: '90px' }],
    },
  },

  plugins: [require('@tailwindcss/forms')],
};
