const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const {CleanWebpackPlugin} = require('clean-webpack-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const cssnano = require('cssnano');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');

const JS_DIR = path.resolve(__dirname, 'assets/src/js');
const IMG_DIR = path.resolve(__dirname, 'assets/src/img');
const BUILD_DIR = path.resolve(__dirname, 'assets/build');

const entry = {
    index: JS_DIR + '/index.js',
    single: JS_DIR + '/single.js'
};

const output = {
    path: BUILD_DIR,
    filename: 'js/[name].js'
};

const rules = [
    {
        test: /\.js$/,
        include: [ JS_DIR ],
        exclude: /node_modules/,
        use: 'babel-loader'
    },
    {
        test: /\.scss$/,
        exclude: /node_modules/,
        use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader']
    },
    {
        test: /\.(png|jpg|svg|jpeg|ico)$/,
        use: [
            {
              loader: 'file-loader',
              options: {
                name: 'img/[name].[ext]',
                publicPath: 'production' === process.env.NODE_ENV ? './' : '../'
              }
            }
          ]
    },
    {
        test: /\.(woff|woff2|eot|ttf|svg)$/, 
        use: {
            loader: 'url-loader?limit=100000'
        }
    }
];

const plugins = (argv) => [
    new CleanWebpackPlugin({
        cleanStaleWebpackAssets: ('production' === argv.mode )
    }),
    new MiniCssExtractPlugin({
        filename: 'css/[name].css'
    })
];

module.exports = (env, argv) => ({
    entry: entry,
    output: output,
    devtool: 'source-map',
    module: {
        rules: rules
    },
    optimization:{
        minimizer: [
            new OptimizeCssAssetsPlugin({
                cssProcessor: cssnano
            }),
            new UglifyJsPlugin({
                cache: false,
                parallel: true,
                sourceMap: false,
            })
        ]
    },
    plugins: plugins(argv),
    externals: {
        jquery: 'jQuery'
    }
});