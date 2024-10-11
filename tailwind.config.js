/** @type {import('tailwindcss').Config} */
const plugin = require('tailwindcss/plugin')

module.exports = {
  content: [
    './resources/js/**/*.{js,vue}',
    './resources/views/**/*.blade.php',
  ],

  theme: {
    extend: {
        colors: {
            'orange': '#E94520'
        }
    },
  },

  plugins: [
    plugin(function({ addBase, config }) {

      addBase({
        // table color 
        'td': { padding: '10px', 'border-color': '#ffffff'},
        'th': { padding: '10px', background: config('theme.colors.slate.800'), color: '#ffffff'},
        'tr': { border: '1px', 'border-bottom': '1px solid #ffffff'},
        'tbody': {background: config('theme.colors.gray.200')}
      })
    })
  ],
}

