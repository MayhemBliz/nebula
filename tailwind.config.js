/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.php',
    './blocks/**/*.php',
    './template-parts/**/*.php',
  ],
  safelist: [
    'bg-white',
    'bg-grey',
    'bg-black',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Outfit', 'sans-serif'],
      },
      colors: {
        primary: '#000000',
        secondary: '#888888',
        grey: '#5A5A5A',
        lightGrey: '#EFF3F5',
        black: '#000000',
        white: '#ffffff'
      },
      height: {
        '820': '820px',
        '90vh': '90vh'
      },
      minWidth: {
        '1/2': '50%'
      },
      maxWidth: {
        'half': '50%'
      },
      spacing: {
        '26': '6.5rem',
      },
    },
  },
  plugins: [],
};