const laravel = require('laravel-vite-plugin');

module.exports = {
    plugins: [
      laravel({
        input: [
            'resources/sass/app.scss',
            'resources/js/app.js',
        ],
        refresh: true,
      })
    ],
    resolve: {
      fullySpecified: false
    }
  };