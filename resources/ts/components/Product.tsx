import React from 'react';

import { Product as BillProduct } from 'carnicos/bill';

interface Props {
  product: BillProduct;
  onClick?: () => any;
}

const Product: React.SFC<Props> = ({ product, onClick }) => (
  <article onClick={onClick} className="product">
    <span className="product__name">{product.getName()}</span>
    <span className="product__desc">{product.getPresentation()}</span>
  </article>
);

export default Product;
