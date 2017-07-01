module.exports = {
  use: [
    "neutrino-middleware-postcss",
    // "neutrino-preset-airbnb-base",
    ["neutrino-preset-react", {
      html: { title: 'Headless Koor Connection' },
      hot: true,
      polyfills: {
        // Enables fast-async polyfill. Set to false to disable
        async: true,
        // Enables babel-polyfill. Set to false to disable
        babel: true
      },
    }],
  ],
  options: {
    output: "dist"
  },
};
