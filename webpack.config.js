const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const VueLoaderPlugin = require('vue-loader/lib/plugin');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin')

module.exports = {
  entry: ['./resources/js/index.js', './resources/sass/style.scss'],
  output: {
    path: path.resolve(__dirname, './dist'),
    publicPath: '/dist/',
    filename: 'js/bundle.js'
  },
  module: {
    rules: [
        {
            test: /.scss$/,
            use: [
                MiniCssExtractPlugin.loader,
                "css-loader",
                "sass-loader"
            ]
        },
        {
            test: /\.css$/,
            use: [              
              'vue-style-loader',
              'css-loader'
            ]
        },
        {
            test: /\.vue$/,
            loader: 'vue-loader'
        },
        {
            test: /\.js$/,
            loader: 'babel-loader',
            exclude: /node_modules/
        },
        {
            test: /\.(png|jpg|gif|svg)$/,
            loader: 'file-loader',
            options: {
            name: '[name].[ext]?[hash]'
            }
        }
    ]
  },
  plugins: [
      new MiniCssExtractPlugin({
          filename: "css/style.css"
      }),
      new VueLoaderPlugin(),
      new UglifyJsPlugin({ sourceMap: true })
  ]
}