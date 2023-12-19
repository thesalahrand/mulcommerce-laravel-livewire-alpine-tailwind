import "./bootstrap";
import "flowbite";
import imageViewer from "./imageViewer";

import Alpine from "alpinejs";

window.Alpine = Alpine;
Alpine.data("imageViewer", imageViewer);

Alpine.start();
