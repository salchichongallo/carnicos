import { ModalElement } from './ModalElement';

export class Modal {

  protected showing: boolean = false;

  protected readonly element: ModalElement;

  public constructor(element: ModalElement) {
    this.element = element;
  }

  public toggle() {
    try {
      const node = this.getNode();

      node.classList.toggle('modal--opened');

      this.showing = !this.showing;
    } catch (ex) {
      console.warn(ex.message);
    }
  }

  protected getNode(): HTMLElement {
    const node = document.querySelector(this.element.selector);

    if (node) {
      return node as HTMLElement;
    }

    throw new Error(`[Modal] '${this.element.selector} not found in DOM.'`);
  }

  public get isShowing() {
    return this.showing;
  }
}
