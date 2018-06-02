import React from 'react';

import { Item as BillItem } from 'carnicos/bill/Item';

import Item from './Item';

const ContentHeader: React.SFC = () => (
  <div className="bill-table__header">
    <span>Cantidad</span>
    <span>Descripción</span>
    <span>Vr. Unitario</span>
    <span>Vr. Total</span>
  </div>
);

const Content: React.SFC<{ items: BillItem[] }> = ({ items }) => (
  <div>
    <ContentHeader />
    <div className="bill-content">
      {items.map(
        item => (
          <Item
            item={item}
            key={item.getProduct().getCode()}
          />
        )
      )}
    </div>
  </div>
);

export default Content;
