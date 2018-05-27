import '../sass/app.scss';

import './alert';
import { Modal } from './modal';

Reflect.set(window, 'modal', new Modal({ selector: '#app-modal' }));
