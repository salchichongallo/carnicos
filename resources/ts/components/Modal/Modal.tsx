import React from 'react';

interface Props {
  className?: string;
  onOverlay?: () => any;
  children: React.ReactNode;
}

const Modal: React.SFC<Props> = (props) => (
  <section className={`modal ${props.className || ''} modal--opened`}>
    <div className="modal__overlay" onClick={props.onOverlay} />
    <div className="modal__container">
      <div>
        {props.children}
      </div>
    </div>
  </section>
);

export default Modal;
