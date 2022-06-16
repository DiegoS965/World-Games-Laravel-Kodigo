module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        youtubeRed: '#ff0000',
        EerieBlack: '#1c1b1a',
        EerieBlackLight: '#222121',
        Jet: '#313131',
        SmokeyBlack: '#101010',
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}