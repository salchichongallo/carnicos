export interface Props {
  initToggle?: boolean;
  children: (onShow: any) => React.ReactNode;
  RenderToggle: (onHide: any) => React.ReactNode;
}
