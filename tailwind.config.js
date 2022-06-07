const plugin = require('tailwindcss/plugin')

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue"
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
    plugin(function({addVariant})
    {
      addVariant('threeOfFour', '&:nth-child(4n-1)')
    })
  ],
}
