import React from 'react';

import { Customer, Store } from 'carnicos/bill';

import Title from './Title';
import CustomerInfo from './CustomerInfo';

interface Props {
  store: Store;
  customer: Customer;
}

const Header: React.SFC<Props> = (props) => (
  <section className="bill-header">
    <Title store={props.store} />
    <CustomerInfo customer={props.customer} />
  </section>
);

export default Header;
