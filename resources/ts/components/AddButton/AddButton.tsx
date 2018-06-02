import React from 'react';

interface Props {
  onClick: (event: any) => any;
}

const AddButton: React.SFC<Props> = ({ onClick }) => (
  <div
    onClick={onClick}
    className="bill-add__btn fab-btn fab-btn--mini"
  >
    <i className="icon">add</i>
  </div>
);

export default AddButton;
