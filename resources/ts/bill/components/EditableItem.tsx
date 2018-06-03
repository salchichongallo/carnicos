import React from 'react';

import { toPesos } from 'carnicos/utils';
import { Int, Item, Product } from 'carnicos/bill';
import ToggleElement from 'carnicos/components/ToggleElement';

interface Props {
  product: Product;
  isEditing?: boolean;
  onAdd: (item: Item) => any;
}

interface State {
  quantity: Int;
  isEditing: boolean;
}

class EditableItem extends React.PureComponent<Props, State> {

  public constructor(props: Props) {
    super(props);
    this.state = {
      quantity: 1,
      isEditing: props.isEditing || false,
    };
  }

  protected onClick = (): void => {
    this.props.onAdd(this.createItem());
  }

  protected createItem() {
    const item = new Item;

    item.setProduct(this.props.product);
    item.setQuantity(this.state.quantity);

    return item;
  }

  protected get quantity() {
    return this.state.quantity;
  }

  protected get unitValue() {
    return this.props.product.getUnitValue();
  }

  protected get name() {
    return this.props.product.getName();
  }

  protected get description() {
    return this.props.product.getDescription();
  }

  protected get total() {
    return this.quantity * this.props.product.getUnitValue();
  }

  protected onChangeQuantity = ({ target }: any) => {
    this.setState({ quantity: target.value });
  }

  protected onToggle = (toggle: any) => {
    return () => {
      toggle();
      this.onClick();
    };
  }

  public render() {
    return (
      <div className="bill-add__grid">
        <ToggleElement
          children={this.renderQuantity}
          initToggle={this.state.isEditing}
          RenderToggle={this.renderInputQuantity}
        />
        <span>{this.description}</span>
        <span>{toPesos(this.unitValue)}</span>
        <span>{toPesos(this.total)}</span>
      </div>
    );
  }

  protected renderQuantity = (onEdit: any) => {
    return (
      <span onClick={onEdit}>
        {this.quantity}
      </span>
    );
  }

  protected renderInputQuantity = (onToggle: any) => {
    return (
      <input
        autoFocus
        min="1"
        type="text"
        name="quantity"
        value={this.quantity}
        onFocus={this.onFocus}
        onChange={this.onChangeQuantity}
        className="input bill-add__input"
        onBlur={this.onToggle(onToggle) as any}
      />
    );
  }

  protected onFocus({ target }: { target: HTMLInputElement }) {
    target.select();
  }
}

export default EditableItem;
