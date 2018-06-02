import React from 'react';

import { Store } from 'carnicos/bill';

const Title: React.SFC<{ store: Store }> = ({ store }) => (
  <div>
    <h2 className="bill-header__store">
      {store.getName()}
    </h2>
    <span className="bill-header__store-id">
      NIT: {store.getNit()}
      <input
        name="store"
        type="hidden"
        value={store.getNit()}
      />
    </span>
  </div>
);

export default Title;
