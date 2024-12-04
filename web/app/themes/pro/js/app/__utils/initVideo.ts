export const initVideo = () => {
    const videoTags = document.querySelectorAll('video');

    videoTags.forEach((item) => {
        const videoSrc = item.dataset.src;
        if (videoSrc) {
            item.src = videoSrc;
        }
    });
};
