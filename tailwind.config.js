/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    fontFamily: {
      sora: ['Sora'],
      pacifico: ['Pacifico'],
    },
    extend: {
      colors: {
        'blue-100': '#0099ff',
        'blue-200': '#008fff',
        'blue-300': '#0085ff',
        'blue-400': '#007aff',
        'blue-500': '#0070ff',
        'blue-600': '#0066ff',
        'blue-700': '#005cff',
        'blue-800': '#0052ff',
        'blue-900': '#0047ff',
        'slate-bg': '#67784e',
      },
      fontSize: {
        12: '12px',
        14: '14px',
        16: '16px',
        20: '20px',
        24: '24px',
        26: '26px',
        32: '32px',
        36: '36px',
        48: '48px',
      },
      boxShadow: {
        md: '6px 6px 16px 0 rgba(0, 0, 0, 0.25), -4px -4px 12px 0 rgba(255, 255, 255, 0.3)',
        sm: '0 1px 1px rgb(0 0 0 / 12%)',
        cus: '29px 29px 58px #b8b8b8, -29px -29px 58px #ffffff',
      },
      animation: {
        fadeIn: 'fadeIn 0.4s linear',
        fadeOut: 'fadeOut 0.5s linear',
      },
      keyframes: {
        fadeIn: {
          '0%': { transform: 'translateY(-50px)', opacity: 0.1 },
          '50%': { transform: 'translateY(-25px)', opacity: 0.2 },
          '100%': { transform: 'translateY(0)', opacity: 1 },
        },
        fadeOut: {
          '0%': { transform: 'translateY(0)', opacity: 0.1 },
          '50%': { transform: 'translateY(-25px)', opacity: 0.2 },
          '100%': { transform: 'translateY(-50px)', opacity: 1 },
        },
      },
    },
  },
  plugins: [require('tailwind-scrollbar')({ nocompatible: true })],
};
