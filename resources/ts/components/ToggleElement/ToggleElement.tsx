import React from 'react';

import { Props } from './ToggleElement.Props';
import { State } from './ToggleElement.State';

class ToggleElement extends React.Component<Props, State> {

  public constructor(props: Props) {
    super(props);

    this.state = {
      isToggle: props.initToggle || false,
    };
  }

  protected show = (): void => {
    this.setState({ isToggle: true });
  }

  protected hide = (): void => {
    this.setState({ isToggle: false });
  }

  public render() {
    return this.state.isToggle
      ? this.props.RenderToggle(this.hide)
      : this.props.children(this.show);
  }
}

export default ToggleElement;
