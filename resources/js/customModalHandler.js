import { Modal } from "flowbite";

const customModalHandler = (target, keepOpenOnPageLoad) => {
    return {
        modal: null,
        isToShowOnPageLoad() {
            this.modal = new Modal(document.querySelector(target), {
                backdropClasses:
                    "bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-[52]",
            });
            keepOpenOnPageLoad && this.show();
        },
        show() {
            this.modal.show();
        },
        hide() {
            this.modal.hide();
        },
    };
};

export default customModalHandler;
