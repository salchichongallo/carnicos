import { Item, Total, Product } from 'carnicos/bill';

export interface State {
  total: Total;
  items: Item[];
  products: Product[];
}
