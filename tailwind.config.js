/** @type {import('tailwindcss').Config} */

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
  ],
}

