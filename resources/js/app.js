import "./bootstrap";
import "flowbite";
import "./modals";
import { initPhoneMask } from "./phone-mask";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// Initialize phone mask when DOM is loaded
document.addEventListener("DOMContentLoaded", function () {
    initPhoneMask();
});
