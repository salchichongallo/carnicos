export class Product {

  public isSelected: boolean = false;

  protected readonly element: Element;

  public constructor(element: Element) {
    this.element = element;

    this.listenForClick();
  }

  protected listenForClick(): void {
    this.element.addEventListener('click', this.handleClick.bind(this));
  }

  protected handleClick(): void {
    // Does nothing :P
  }

  protected select(): void {
    this.isSelected = true;
    this.element.classList.add('product--active');
  }

  protected unselect(): void {
    this.isSelected = false;
    this.element.classList.remove('product--active');
  }

  public hasId(id: string): boolean {
    return this.id === id;
  }

  public get id(): string {
    return this.element.getAttribute('data-id') as string;
  }

  public get name(): string {
    return this.getTagText('.product__name');
  }

  public get description(): string {
    return this.getTagText('.product__desc');
  }

  protected getTagText(selector: string): string {
    const nameElement = this.element.querySelector(selector) as HTMLSpanElement;

    return String(nameElement.innerHTML);
  }
}

Reflect.set(window, 'Product', Product);
