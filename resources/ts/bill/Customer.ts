import { Id } from './types';

export class Customer {

  protected id: Id;

  public getId() {
    return this.id;
  }

  public setId(id: Id): void {
    this.id = id;
  }
}
