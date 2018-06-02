import React from 'react';

import Modal from 'carnicos/components/Modal';
import Product from 'carnicos/components/Product';
import AddButton from 'carnicos/components/AddButton';
import { Item, Product as BillProduct } from 'carnicos/bill';

import EditableItem from './EditableItem';

interface Props {
  products: BillProduct[];
  onAdd: (item: Item) => any;
}

interface State {
  product?: BillProduct;
  isSelecting: boolean,
}

class NewItemForm extends React.PureComponent<Props, State> {

  public state: State = {
    isSelecting: false,
  };

  public componentWillReceiveProps() {
    this.cancel();
  }

  protected showModal = (): void => {
    this.setState({ isSelecting: true });
  }

  protected hideModal = (): void => {
    this.setState({ isSelecting: false });
  }

  protected cancel = (): void => {
    this.setState({
      product: undefined,
      isSelecting: false,
    });
  }

  protected onSelect = (product: BillProduct): void => {
    this.setState({
      product,
      isSelecting: false,
    });
  }

  public render() {
    const { product } = this.state;

    if (this.state.isSelecting) {
      return this.renderModal();
    }

    return (
      <div className="bill-add">
        <AddButton onClick={this.showModal} />

        {product && (
          <EditableItem
            isEditing
            product={product}
            onAdd={this.props.onAdd}
          />
        )}
      </div>
    );
  }

  protected renderModal = () => {
    if (this.props.products.length === 0) {
      return this.renderEmptyModal();
    }

    return (
      <Modal className="bill-modal" onOverlay={this.cancel}>
        <div className="modal__content">
          <h2 className="modal__title bill-modal__title">Productos Disponibles</h2>
          <div className="bill-modal__products">
            {this.props.products.map((product) => (
              <Product
                product={product}
                onClick={() => this.onSelect(product)}
                key={product.getCode()}
              />
            ))}
          </div>
        </div>
      </Modal>
    );
  }

  protected renderEmptyModal = () => (
    <Modal onOverlay={this.cancel}>
      <div className="modal__content bill-modal">
        <h2 className="modal__title bill-modal__title">No hay productos disponibles</h2>
        <div className="actions actions--end">
          <button onClick={this.hideModal} className="btn btn--inline">
            Aceptar
          </button>
        </div>
      </div>
    </Modal>
  );
}

export default NewItemForm;
