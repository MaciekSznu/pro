/**
 * --------------------------------------------------------------------------
 * Initialize a team slider.
 * --------------------------------------------------------------------------
 */

import { Slider } from '../../../../../js/lib/sliders';
const $ = jQuery.noConflict();

const initSingleOfferTeamSlider = () => {
    const singleOfferSliderWrapper = document.querySelector(
        '.single-offer-team__slider'
    );

    const currentSlideElement = document.querySelector('.single-offer-team__slider-counter .current-slide');
    const totalSlides = document.querySelector('.single-offer-team__slider-counter .total-slides');

    if (!singleOfferSliderWrapper) {
        return;
    }

    if (singleOfferSliderWrapper) {
        const singleOfferSlider = new Slider(singleOfferSliderWrapper, {
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

        $(singleOfferSliderWrapper).on('init', function(event, slick) {
            if(totalSlides) {
                totalSlides.textContent = slick.slideCount;
            }
        });

        $(singleOfferSliderWrapper).on('afterChange', function(event, slick, currentSlide ) {
            if(currentSlideElement) {
                currentSlideElement.textContent = slick.currentSlide + 1;
            }
        });
    }
};

initSingleOfferTeamSlider();
