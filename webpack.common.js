const path = require('path');
const webpack = require('webpack'); // to access built-in plugins
const JS_DIR = path.resolve(__dirname, 'assets/src/js');

module.exports = {
    entry: {
      main: {
        import: JS_DIR + '/main.js',
        dependOn: "vendor"
      },
      vendor: {
        import: JS_DIR + '/vendor.js'
      },
      homepage: {
        import: JS_DIR + "/pages/homepage.js",
        dependOn: ["main", "vendor"]
      },
    },
    plugins: [
        new webpack.ProgressPlugin(),
        new webpack.ProvidePlugin({
          $: 'jquery',
          jQuery: 'jquery'
        })
    ],
    module:{
      rules:[
        {
          test: /\.js$/,
          include: [ JS_DIR ],
          exclude: /node_modules/,
          use: 'babel-loader'
        },
        { test: /\.woff2(\?v=[0-9]\.[0-9]\.[0-9])?$/i, loader: 'url-loader', options: { limit: 10000, mimetype: 'application/font-woff2' } },
        { test: /\.woff(\?v=[0-9]\.[0-9]\.[0-9])?$/i, loader: 'url-loader', options: { limit: 10000, mimetype: 'application/font-woff' } },
        { test: /\.(ttf|eot|svg|otf)(\?v=[0-9]\.[0-9]\.[0-9])?$/i, loader: 'file-loader' }
      ]
    },
    externals: {
      jquery: 'jQuery'
    }
}