import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
    extend: {
      colors: {
        jig: {
          bg: "#F6EEDC",      // fondo crema
          sidebar: "#6B3F2A", // café
          card: "#FFF6E8",    // tarjetas
          accent: "#F28C28",  // naranja
          line: "#E8D7BE",    // líneas suaves
          text: "#3B2A1F",    // texto oscuro
        },
      },
    },
  },

    plugins: [forms],
};
