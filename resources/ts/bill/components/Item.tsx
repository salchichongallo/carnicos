import React from 'react';

import { toPesos } from 'carnicos/utils';
import { Item as BillItem } from 'carnicos/bill';

interface Props {
  item: BillItem;
}

const Item: React.SFC<Props> = ({ item }) => (
  <React.Fragment>
    <span>{item.getQuantity()}</span>
    <span>{item.getProduct().getDescription()}</span>
    <span>{toPesos(item.getProduct().getUnitValue())}</span>
    <span>
      {toPesos(item.getTotal())}
      <input
        type="hidden"
        name="items[]"
        value={`${item.getProduct().getCode()},${item.getQuantity()}`}
      />
    </span>
  </React.Fragment>
);

export default Item;
