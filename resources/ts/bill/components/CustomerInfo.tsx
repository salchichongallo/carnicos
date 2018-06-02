import React from 'react';

import { Customer } from 'carnicos/bill';

const CustomerInfo: React.SFC<{ customer: Customer }> = () => (
  <label htmlFor="customer" className="bill-customer form-control">
    <span>Cliente:</span>
    <input
      required
      type="text"
      id="customer"
      name="customer"
      className="input"
    />
  </label>
);

export default CustomerInfo;
