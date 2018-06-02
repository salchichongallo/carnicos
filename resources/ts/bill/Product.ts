import { Code } from './types';

export class Product {

  protected code: Code;

  protected name: string;

  protected description: string;

  protected presentation: string;

  protected unitValue: number;

  public getName() {
    return this.name;
  }

  public setName(name: string): void {
    this.name = name;
  }

  public getCode() {
    return this.code;
  }

  public setCode(code: Code): void {
    this.code = code;
  }

  public getDescription() {
    return `${this.name} ${this.presentation}`;
  }

  public getPresentation() {
    return this.presentation;
  }

  public setPresentation(value: string): void {
    this.presentation = value;
  }

  public getUnitValue() {
    return this.unitValue;
  }

  public setUnitValue(value: number): void {
    this.unitValue = value;
  }
}
