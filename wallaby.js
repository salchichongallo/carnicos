module.exports = () => ({
  files: [
    'resources/ts/**/*.js',
    'resources/ts/**/*.jsx',
    'resources/ts/**/*.ts',
    'resources/ts/**/*.tsx',
    'tsconfig.json',
    'jest.config.js',
    'package.json',
    '!resources/ts/**/*.test.js',
    '!resources/ts/**/*.test.jsx',
    '!resources/ts/**/*.test.ts',
    '!resources/ts/**/*.test.tsx',
  ],

  tests: [
    'resources/ts/**/*.test.js',
    'resources/ts/**/*.test.jsx',
    'resources/ts/**/*.test.ts',
    'resources/ts/**/*.test.tsx',
    'test/**/*.test.js',
    'test/**/*.test.jsx',
    'test/**/*.test.ts',
    'test/**/*.test.tsx',
  ],

  env: {
    type: 'node',
    runner: 'node',
  },

  debug: true,

  testFramework: 'jest',

  setup (wallaby) {
    // eslint-disable-next-line
    const jestConfig = require('./jest.config');

    jestConfig.globals = { '__DEV__': true };

    delete jestConfig.transform;

    wallaby.testFramework.configure(jestConfig);
  },
});
