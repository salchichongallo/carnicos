import React from 'react';
import ReactDOM from 'react-dom';

import Bill from 'carnicos/bill/containers';
import { Customer, Store, Product } from 'carnicos/bill';

const store = new Store({
  nit: '123',
  name: 'Tiendas D1',
});

const customer = new Customer;

const products: Product[] = [];

(window['__PRODUCTS__'] as any[])
  .forEach(p => {
    const product = new Product;

    product.setCode(p.code);
    product.setName(p.name);
    product.setPresentation(p.presentation);
    product.setUnitValue(p.unitValue);

    products.push(product);
  });

ReactDOM.render(
  <Bill customer={customer} store={store} products={products} />,
  document.getElementById('bill-app') as HTMLElement
);
