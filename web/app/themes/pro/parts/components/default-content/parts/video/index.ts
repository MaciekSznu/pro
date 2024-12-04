/**
 * --------------------------------------------------------------------------
 * Initialize content video play.
 * --------------------------------------------------------------------------
 */

const initVideoButton = () => {
    const videoWrappers = document.querySelectorAll(
        '.default-content__video-wrapper'
    );

    if (!videoWrappers) {
        return;
    }

    videoWrappers.forEach((wrapper) => {
        const video = wrapper.querySelector('video');
        const playButton = wrapper.querySelector('.js-play-video');

        if (video && playButton) {
            playButton.addEventListener('click', () => {
                if ((video.paused || video.ended) && video.readyState > 2) {
                    video.play();
                    playButton.classList.add('playing');
                } else if (
                    !video.paused &&
                    !video.ended &&
                    video.readyState > 2
                ) {
                    video.pause();
                    playButton.classList.remove('playing');
                }
            });

            video.addEventListener('ended', () => {
                playButton.classList.remove('playing');
            });
        }
    });
};

initVideoButton();
