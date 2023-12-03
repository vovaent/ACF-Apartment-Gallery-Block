/**
 * External libs
 */
import Swiper from 'swiper';
import { Thumbs } from 'swiper/modules';
import 'swiper/css';

const gallery = () => {
	const init = ( index ) => {
		const galleryThumbs = new Swiper( `#ag-modal-thumbs-${ index }`, {
			spaceBetween: 10,
			slidesPerView: 3,
			freeMode: true,
			watchSlidesVisibility: true,
			watchSlidesProgress: true,
		} );

		const gallerySlider = new Swiper( `#ag-modal-slider-${ index }`, {
			modules: [ Thumbs ],
			spaceBetween: 10,
			loop: true,
			loopedSlides: 1,
			thumbs: {
				swiper: galleryThumbs,
			},
		} );
	};

	const elsModal = document.querySelectorAll( '.ag-modal' );

	if ( elsModal.length > 0 ) {
		elsModal.forEach( ( modal, index ) => init( index ) );
	}
};

export default gallery;
