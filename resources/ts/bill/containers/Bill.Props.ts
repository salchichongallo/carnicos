import {
  Store,
  Product,
  Customer,
} from 'carnicos/bill';

export interface Props {
  store: Store;
  customer: Customer;
  products: Product[];
}
