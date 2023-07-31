import './bootstrap';
import 'datatables.net-bs5';
import 'datatables.net-buttons-bs5';
import.meta.glob(["../images/**"]);
import.meta.glob(["../css/**"]);
import.meta.glob(["../js/**"]);

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
