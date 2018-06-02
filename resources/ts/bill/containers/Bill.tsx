import React from 'react';

import { Item, Total } from 'carnicos/bill';
import BillHeader from 'carnicos/bill/components/Header';
import BillFooter from 'carnicos/bill/components/Footer';
import BillContent from 'carnicos/bill/components/Content';
import NewItemForm from 'carnicos/bill/components/NewItemForm';

import { Props } from './Bill.Props';
import { State } from './Bill.State';

export class Bill extends React.Component<Props, State> {

  public constructor(props: Props) {
    super(props);
    this.state = {
      total: 0,
      items: [],
      products: props.products,
    };
  }

  public onSubmit = (_event: Event): void => {
    // Let is pass...
  }

  public total = (items: Item[]): Total => {
    let total: Total = 0;

    items.forEach(
      item => total += item.getTotal()
    );

    return total;
  }

  public add = (item: Item): void => {
    if (this.hasItem(item)) {
      return;
    }

    const items = [ ...this.state.items, item ];

    const products = this.removeProduct(item);

    this.setState({
      items,
      products,
      total: this.total(items),
    });
  }

  protected hasItem = (item: Item): boolean => {
    if (this.state.items.includes(item)) {
      return true;
    }

    return this.state.items.some(
      i => i.getProduct().getCode() === item.getProduct().getCode()
    );
  }

  protected removeProduct = (item: Item) => {
    const code = item.getProduct().getCode();

    return this.state
      .products
      .filter(p => p.getCode() !== code);
  }

  public render() {
    const { store, customer } = this.props;
    const { items, total, products } = this.state;

    return (
      <form action="?menu=nueva_venta" method="POST" className="app-bill">
        <BillHeader store={store} customer={customer} />

        <BillContent items={items} />

        <NewItemForm products={products} onAdd={this.add} />

        <BillFooter onSubmit={this.onSubmit} total={total} />
      </form>
    );
  }
}
