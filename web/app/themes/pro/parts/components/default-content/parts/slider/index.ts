/**
 * --------------------------------------------------------------------------
 * Initialize a content slider.
 * --------------------------------------------------------------------------
 */

import { Slider } from '../../../../../js/lib/sliders';
const $ = jQuery.noConflict();

const initDefaultContentSlider = () => {
    const defaultSliderWrapper = document.querySelector(
        '.default-content__slider'
    );

    const currentSlideElement = document.querySelector('.default-content__slider-counter .current-slide');
    const totalSlides = document.querySelector('.default-content__slider-counter .total-slides');

    if (!defaultSliderWrapper) {
        return;
    }

    if (defaultSliderWrapper) {
        const defaultSlider = new Slider(defaultSliderWrapper, {
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

        $(defaultSliderWrapper).on('init', function(event, slick) {
            if(totalSlides) {
                totalSlides.textContent = slick.slideCount;
            }
        });

        $(defaultSliderWrapper).on('afterChange', function(event, slick, currentSlide ) {
            if(currentSlideElement) {
                currentSlideElement.textContent = slick.currentSlide + 1;
            }
        });
    }
};

initDefaultContentSlider();
