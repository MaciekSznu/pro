/**
 * --------------------------------------------------------------------------
 * Initialize a arts slider.
 * --------------------------------------------------------------------------
 */

import { Slider } from '../../../../../js/lib/sliders';
const $ = jQuery.noConflict();

const initSingleTeamArtsSlider = () => {
    const singleTeamSliderWrapper = document.querySelector(
        '.single-team-arts__slider'
    );

    const currentSlideElement = document.querySelector('.single-team-arts__slider-counter .current-slide');
    const totalSlides = document.querySelector('.single-team-arts__slider-counter .total-slides');

    if (!singleTeamSliderWrapper) {
        return;
    }

    if (singleTeamSliderWrapper) {
        const singleTeamSlider = new Slider(singleTeamSliderWrapper, {
            autoplay: false,
            infinite: false,
            speed: 500,
            dots: false,
            arrows: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            variableWidth: true,
            mobileFirst: true,
            prevArrow: '.slider-button--prev',
            nextArrow: '.slider-button--next',
        });

        $(singleTeamSliderWrapper).on('init', function(event, slick) {
            if(totalSlides) {
                totalSlides.textContent = slick.slideCount;
            }
        });

        $(singleTeamSliderWrapper).on('afterChange', function(event, slick, currentSlide ) {
            if(currentSlideElement) {
                currentSlideElement.textContent = slick.currentSlide + 1;
            }
        });
    }
};

initSingleTeamArtsSlider();
