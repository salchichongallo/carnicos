import { Product } from './Product';
import { Int, Total } from './types';

export class Item {

  protected product: Product;

  protected quantity: Int = 0;

  public getTotal(): Total {
    return this.quantity * this.product.getUnitValue();
  }

  public getQuantity() {
    return this.quantity;
  }

  public setQuantity(quantity: Int): void {
    this.quantity = quantity;
  }

  public getProduct() {
    return this.product;
  }

  public setProduct(product: Product): void {
    this.product = product;
  }
}
