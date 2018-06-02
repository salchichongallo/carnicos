import { Nit } from './types';

export class Store {

  protected readonly nit: Nit;

  protected readonly name: string;

  public constructor({ nit, name }: { nit: Nit, name: string }) {
    this.nit = nit;
    this.name = name;
  }

  public getNit() {
    return this.nit;
  }

  public getName() {
    return this.name;
  }
}
