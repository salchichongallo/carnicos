import React from 'react';

import { Total } from 'carnicos/bill';
import { toPesos } from 'carnicos/utils';

interface Props {
  total: Total;
  onSubmit: any;
}

const Footer: React.SFC<Props> = (props) => (
  <div className="bill-footer">
    <div className="bill-footer__total-container">
      <span>Total</span>

      <span className="bill-footer__total">
        $ {toPesos(props.total)}
      </span>
    </div>

    <div>
      <div className="bill-footer__actions">
        <button
          type="submit"
          onClick={props.onSubmit}
          className="btn btn--inline"
        >
          Enviar
        </button>
      </div>
    </div>
  </div>
);

export default Footer;
