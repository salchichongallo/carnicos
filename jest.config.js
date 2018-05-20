module.exports = {

  transform: {
    '\\.(js|jsx|ts|tsx)$': 'ts-jest',
  },

  testRegex: '(/test/.*|\\.(test|spec))\\.(js|jsx|ts|tsx)$',

  moduleFileExtensions: [
    'js',
    'jsx',
    'ts',
    'tsx',
    'json',
  ],
};
