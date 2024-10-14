/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
  ],
  theme: {
      extend: {
          colors: {
              'user-color': '#000000', // Default color (this will be dynamically updated)
          }
    },
  },
  plugins: [],
}

