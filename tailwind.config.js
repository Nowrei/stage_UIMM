/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./templates/**/*.html.twig',
  './node_modules/tw-elements/dist/js/**/*.js',
  "./node_modules/flowbite/**/*.js"],
  theme: {

    screens: {

      'mobile': {'min': '300px', 'max': '699px'},
      // => @media (min-width: 640px) { ... }

      'tablet': {'min': '700px', 'max': '1279px'},
      // => @media (min-width: 640px) { ... }

      'laptop': '1024px',
      // => @media (min-width: 1024px) { ... }

      'desktop': '1280px',
      // => @media (min-width: 1280px) { ... }
    },

    fontSize: {
      small: ['14px'],
      b: ['20px'],
      p: ['14px'],
      si: ['20px'],
      s: ['25px'],
      big: ['26px'],

    },
    extend: {

      spacing: {
        '30': '30px',
      },

      width: {
      '10%': '10%',
      '15': '15%',
      '20%': '20%',
      '25%': '25%',
      '30': '30%',
      '35': '35%',
      '40': '40%',
      '50%': '50%',
      '60%': '60%',
      '65': '65%',
      '70': '70%',
      '75': '75%',
      '80': '80%',
      '85': '85%',
      '90%': '90%',
      '95': '95%',
      '100': '100%',
      '536px': '536px',
      '250': '250px',
      '260': '260.26px',
      'px': '75px',
    },

    height: {
      
      '90': '90%',
      '350': '350px',
      '100': '100%',
      '501': '501px',
      'px': '75px',
    },
    colors: {
  
      'white': '#ffffff',
      'konbini': {
        100: '#E9E9E9C9', 
        200: '#1C1C1C', 
        300: '#ffffff', 


        
      },
    },
    height: {
      '15': '80px',
      '146': '146.39px',

    },},
  },
  plugins: [require("tw-elements/dist/plugin"),
  require('flowbite/plugin')],
}


