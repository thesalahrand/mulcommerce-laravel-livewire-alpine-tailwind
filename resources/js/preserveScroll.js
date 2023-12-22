const preserveScroll = () => {
    return {
        prevScrollPosition:
            JSON.parse(localStorage.getItem("prev-scroll-position")) || {},

        goToPrevScrollPosition() {
            if (Object.keys(this.prevScrollPosition).length) {
                window.scrollTo(
                    this.prevScrollPosition.x,
                    this.prevScrollPosition.y
                );
                setTimeout(() => {
                    localStorage.removeItem("prev-scroll-position");
                }, 5000);
            }
        },

        storeCurrScrollPosition(e) {
            e.preventDefault();
            localStorage.setItem(
                "prev-scroll-position",
                JSON.stringify({ x: window.scrollX, y: window.scrollY })
            );
            e.target.submit();
        },
    };
};

export default preserveScroll;
