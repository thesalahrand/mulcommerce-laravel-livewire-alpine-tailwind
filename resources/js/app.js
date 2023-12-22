import "./bootstrap";
import "flowbite";
import imageViewer from "./imageViewer";
import preserveScroll from "./preserveScroll";

import Alpine from "alpinejs";

window.Alpine = Alpine;
Alpine.data("imageViewer", imageViewer);
Alpine.data("preserveScroll", preserveScroll);

Alpine.start();
