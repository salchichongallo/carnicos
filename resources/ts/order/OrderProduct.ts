/* eslint-disable no-alert, no-console, no-restricted-globals */

import { validNumber } from '../utils';

import { Product } from './Product';

export class OrderProduct extends Product {

  public quantity: number = 0;

  protected readonly DEFAULT_QUANTITY = 1;

  protected handleClick(): void {
    this.handleQuantity();
  }

  protected handleQuantity(): void {
    if (this.isSelected) {
      return this.unselect();
    }

    this.readQuantity();

    return this.quantity > 0
      ? this.select()
      : this.unselect();
  }

  protected readQuantity(): void {
    const defaultQuantity = String(this.quantity || this.DEFAULT_QUANTITY);

    const quantity = prompt('Cantidad:', defaultQuantity);

    if (! quantity) {
      return;
    }

    this.quantity = OrderProduct.ensureQuantity(quantity);
  }

  protected static ensureQuantity(str: string): number {
    const quantity = parseInt(str, 10);

    return validNumber(quantity) ? 0 : quantity;
  }

  protected showQuantity(): void {
    this.hideQuantity();

    const quantity = document.createElement('span');

    quantity.innerText = `x${this.quantity}`;
    quantity.classList.add('product__quantity');

    this.element.appendChild(quantity);
  }

  protected hideQuantity(): void {
    const quantity = this.element.querySelector('.product__quantity') as HTMLSpanElement;

    if (! quantity) {
      return;
    }

    this.element.removeChild(quantity);
  }

  protected logQuantity(): void {
    const product = `${this.name} - ${this.description}`;

    console.info(`Quantity for product [${product}]: ${this.quantity} units.`);
  }

  protected select(): void {
    super.select();

    this.showQuantity();
    this.logQuantity();
  }

  protected unselect(): void {
    super.unselect();

    this.quantity = 0;
    this.hideQuantity();
  }
}
