import { OrderProduct } from './OrderProduct';

export const orderProducts: OrderProduct[] = [];

document.querySelectorAll('.page-order .product')
  .forEach((element) => {
    orderProducts.push(
      new OrderProduct(element)
    );
  });

const orderForm = document.getElementById('orders') as HTMLFormElement;
if (orderForm) {
  orderForm.addEventListener('submit', () => {
    orderProducts
      .filter(p => p.isSelected)
      .forEach(p => {
        const element = document.createElement('input');

        element.type = 'hidden';
        element.name = 'products[]';
        element.value = `${p.id},${p.quantity}`;

        orderForm.appendChild(element);
      });
  });
}

