const imageViewer = (imageUrl) => {
    return {
        imageUrl,

        fileChosen(event) {
            this.fileToDataUrl(event, (src) => (this.imageUrl = src));
        },

        fileToDataUrl(event, callback) {
            if (!event.target.files.length) return;
            console.log("Hello");

            let file = event.target.files[0],
                reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = (e) => callback(e.target.result);
        },
    };
};

export default imageViewer;
