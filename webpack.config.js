/* eslint-disable typescript/no-var-requires */
const path = require('path');
const webpack = require('webpack');
const TsconfigPathsPlugin = require('tsconfig-paths-webpack-plugin');

process.noDeprecation = true;

module.exports = {
  target: 'web',

  devtool: 'source-map',

  entry: {
    app: path.resolve(__dirname, 'resources/ts/app.ts'),
    sale: path.resolve(__dirname, 'resources/ts/bill-app.tsx'),
  },

  output: {
    publicPath: './assets/',
    filename: '[name].js',
    path: path.join(__dirname, 'public/assets'),
  },

  module: {
    rules: [
      {
        test: /\.(js|jsx|ts|tsx)$/,
        exclude: /node_modules/,
        use: [
          {
            loader: 'awesome-typescript-loader',
            options: {
              transpileOnly : true,
            },
          },
        ],
      },
      {
        test: /\.(sass|scss)?$/,
        exclude: /node_modules/,
        use: [
          {
            loader: 'style-loader',
            options: { sourceMap: true },
          },
          {
            loader: 'css-loader',
            options: { sourceMap: true },
          },
          'resolve-url-loader',
          {
            loader: 'sass-loader',
            options: { sourceMap: true },
          },
        ],
      },
      {
        // Preprocess 3rd party .css files located in node_modules
        test: /\.css$/,
        include: /node_modules/,
        use: [ 'style-loader', 'css-loader' ],
      },
      {
        test: /\.(eot|svg|otf|ttf|woff|woff2|jpg|jpeg|png|gif)$/,
        use: 'file-loader',
      },
      {
        test: /\.(mp4|webm)$/,
        use: {
          loader: 'url-loader',
          options: {
            limit: 10000,
          },
        },
      },
    ],
  },

  plugins: [
    new webpack.NamedModulesPlugin(),
    new webpack.NoEmitOnErrorsPlugin(),
    // Always expose NODE_ENV to webpack, in order to use `process.env.NODE_ENV`
    // inside your code for any environment checks; UglifyJS will automatically
    // drop any unreachable code.
    new webpack.DefinePlugin({
      'process.env': {
        NODE_ENV: JSON.stringify(process.env.NODE_ENV),
      },
    }),
  ],

  resolve: {
    plugins: [
      new TsconfigPathsPlugin({
        extensions: [ '.js', '.jsx', '.ts', '.tsx' ],
      }),
    ],
    extensions: [
      '.js',
      '.jsx',
      '.ts',
      '.tsx',
    ],
    mainFields: [
      'browser',
      'jsnext:main',
      'main',
    ],
  },
};
