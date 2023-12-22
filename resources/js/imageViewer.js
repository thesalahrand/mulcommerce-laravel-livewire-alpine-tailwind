const imageViewer = (imageUrl) => {
    return {
        imageUrl,

        fileChosen(e) {
            this.fileToDataUrl(e, (src) => (this.imageUrl = src));
        },

        fileToDataUrl(e, callback) {
            if (!e.target.files.length) return;

            let file = e.target.files[0],
                reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = (e) => callback(e.target.result);
        },
    };
};

export default imageViewer;
