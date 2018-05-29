import '../sass/app.scss';

import './alert';
import './order';
import { Modal } from './modal';

Reflect.set(window, 'modal', new Modal({ selector: '#app-modal' }));
