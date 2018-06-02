/* eslint-disable no-restricted-globals */

export const validNumber = (n: number): boolean => isNaN(n) || n === Infinity;

export const toPesos = (amount: number): string => {
  return Intl.NumberFormat().format(amount);
};
