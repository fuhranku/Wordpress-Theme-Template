const path = require('path');
const common = require('./webpack.common');
const { merge } = require('webpack-merge');
const BUILD_DIR = path.resolve(__dirname, 'assets/build');
const webpack = require('webpack');

module.exports = merge(common, {
    mode: "development",
    devtool: 'source-map',
    output: {
        path: BUILD_DIR,
        filename: 'js/[name].bundle.js',
        clean: true
    },
    module:{
        rules:[
            {
                test: /\.scss$/,
                use: ["style-loader","css-loader","resolve-url-loader","sass-loader"]
            },
            {
                test: /\.(png|jpg|svg|jpeg|ico|webp|gif)$/,
                use: [
                    {
                      loader: 'file-loader',
                      options: {
                        publicPath: "http://localhost/stephens_and_company/wp-content/themes/stephensandcompany/assets/build/images",
                        outputPath: "/images",
                        name: '[name].[ext]',
                      }
                    }
                  ]
            },
        ]
    },
    plugins: [
        new webpack.EnvironmentPlugin({
            URL: "http://localhost/stephens_and_company/",
            THEME_URL: "http://localhost/stephens_and_company/wp-content/themes/stephensandcompany/"
        })
    ],
    watch: true,
    watchOptions: {
        ignored: /node_modules/,
    },
});