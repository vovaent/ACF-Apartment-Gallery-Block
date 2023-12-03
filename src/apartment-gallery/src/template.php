<?php
/**
 * Render template
 *
 * @package acf
 */

?>

<!-- Our front-end template -->
<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?>">

	<?php if ( ! empty( $data['benefits'] ) ) : ?>

		<div class="wp-block-acf-apartment-gallery__benefits">
				
			<?php foreach ( $data['benefits'] as $key => $benefit ) : ?>
					
				<div class="wp-block-acf-apartment-gallery__benefit ag-benefit" data-trigger-id="<?php echo esc_html( $key ); ?>">
					<div class="ag-benefit__picture">
						<?php echo wp_get_attachment_image( $benefit['photo'], 'medium' ); ?>
					</div>
					<!-- /.ag-benefit__picture -->

					<div class="ag-benefit__bottom">
						<div class="ag-benefit__text">
							<p class="ag-benefit__title">
								<?php echo esc_html( $benefit['title'] ); ?>
							</p>
							<div class="ag-benefit__description">
								<?php echo wp_kses_post( $benefit['description'] ); ?>
							</div>
						</div>
						<!-- /.ag-benefit__text -->

						<div class="ag-benefit__icon">
							<?php echo wp_get_attachment_image( $benefit['icon'] ); ?>
						</div>
					</div>
					<!-- /.ag-benefit__bottom -->

					<div class="wp-block-acf-apartment-gallery__modal ag-modal ag-modal--hidden" data-modal-id="<?php echo esc_html( $key ); ?>">
						<div class="ag-modal__content">
							<div class="ag-modal__cross"></div>

							<?php if ( ! empty( $benefit['modal']['gallery'] ) ) : ?>
		
								<div class="ag-modal__gallery">
									<div 
										id="ag-modal-slider-<?php echo esc_html( $key ); ?>" 
										class="swiper-container ag-modal__slider"
									>
										<div class="swiper-wrapper ag-modal__slider-wrapper">
								
												<?php foreach ( $benefit['modal']['gallery'] as $slide ) : ?>
												
													<div class="swiper-slide ag-modal__slide">
														<?php echo wp_get_attachment_image( $slide['photo'], 'large' ); ?>
													</div>

												<?php endforeach; ?>

										</div>
										<!-- /.swiper-wrapper ag-modal__slider-wrapper -->							
									</div>
									<!-- /.swiper-container ag-modal__slider -->

									<div 
										id="ag-modal-thumbs-<?php echo esc_html( $key ); ?>" 
										class="swiper-container ag-modal__thumbs" 
										thumbsSlider=""
									>
										<div class="swiper-wrapper ag-modal__thumbs-wrapper">
											
											<?php foreach ( $benefit['modal']['gallery']  as $slide ) : ?>
												
												<div class="swiper-slide ag-modal__thumb">
													<?php echo wp_get_attachment_image( $slide['photo'], 'medium' ); ?>
												</div>

											<?php endforeach; ?>

										</div>
										<!-- /.swiper-wrapper ag-modal__thumbs-wrapper -->
									</div>
									<!-- /.swiper-container ag-modal__thumbs -->
								</div>
								<!-- /.ag-modal__gallery -->						
							
							<?php endif; ?>

							<div class="ag-modal__text">
								<h3 class="ag-modal__title">
									<?php echo wp_kses_post( $benefit['modal']['title'] ); ?>
								</h3>
								<div class="ag-modal__subtitle">
									<?php echo esc_html( $benefit['modal']['subtitle'] ); ?>
								</div>
								<div class="ag-modal__description">
									<?php echo wp_kses_post( $benefit['modal']['description'] ); ?>
								</div>
							</div>
							<!-- /.ag-modal__text -->
						</div>
						<!-- /.ag-modal__content -->
					</div>
					<!-- /.wp-block-acf-apartment-gallery__modal modal -->
				</div>
				<!-- /.wp-block-acf-apartment-gallery__benefit benefit -->

			<?php endforeach; ?>

			<div class="wp-block-acf-apartment-gallery__decor wp-block-acf-apartment-gallery__decor--one">
				<svg xmlns="http://www.w3.org/2000/svg" width="173" height="92" viewBox="0 0 173 92" fill="none">
					<path d="M172.334 12.989C166.158 20.5741 156.914 29.8419 143.542 38.1405C123.245 50.7286 103.663 54.7171 95.3601 56.3669C79.5721 59.5015 63.5832 60.0501 46.56 57.7775C50.2754 53.9128 53.5889 50.4564 57.0249 46.8846C72.2246 47.6558 86.8656 46.3277 100.889 42.6775C105.531 41.469 112.873 39.2748 121.363 35.4719C136.553 28.6747 147.023 20.4751 153.39 14.6925C143.641 13.0262 108.148 8.00246 71.6806 25.0657C26.1499 46.3772 14.9939 85.3294 13.3372 91.5699C8.99439 90.5511 4.6663 89.5324 0 88.4352C2.22531 78.5074 6.01912 69.1447 11.7197 60.4502C37.051 21.8403 76.1165 1.87751 128.436 0.582405C128.436 0.582405 145.052 -1.02618 167.055 5.54423C171.609 6.90533 172.535 8.6995 172.795 9.42542C173.3 10.8278 172.766 12.1847 172.334 12.989Z" fill="#C7C7C7" fill-opacity="0.05"/>
				</svg>
			</div>
			<!-- /.wp-block-acf-apartment-gallery__decor -->
			<div class="wp-block-acf-apartment-gallery__decor wp-block-acf-apartment-gallery__decor--two">
				<svg xmlns="http://www.w3.org/2000/svg" width="110" height="59" viewBox="0 0 110 59" fill="none">
					<path d="M0.423256 8.78662C4.35018 13.5624 10.2281 19.3977 18.7302 24.6227C31.6361 32.5486 44.0869 35.0598 49.3664 36.0986C59.405 38.0723 69.5714 38.4177 80.3954 36.9867C78.033 34.5534 75.9261 32.3772 73.7414 30.1282C64.0768 30.6139 54.7675 29.7776 45.8509 27.4794C42.8995 26.7185 38.2308 25.3369 32.8328 22.9425C23.1745 18.6628 16.5174 13.5001 12.4689 9.85916C18.6679 8.81 41.2352 5.64693 64.4228 16.3904C93.3729 29.8088 100.466 54.3343 101.52 58.2634C104.281 57.622 107.033 56.9805 110 56.2898C108.585 50.0389 106.173 44.1439 102.548 38.6696C86.4416 14.3596 61.6022 1.79048 28.3356 0.975044C28.3356 0.975044 17.7703 -0.0377617 3.77984 4.09916C0.884514 4.95614 0.295464 6.08581 0.130287 6.54287C-0.19072 7.42583 0.148994 8.28022 0.423256 8.78662Z" fill="#C7C7C7" fill-opacity="0.05"/>
				</svg>
			</div>
			<!-- /.wp-block-acf-apartment-gallery__decor -->
			<div class="wp-block-acf-apartment-gallery__decor wp-block-acf-apartment-gallery__decor--three">
				<svg xmlns="http://www.w3.org/2000/svg" width="125" height="67" viewBox="0 0 125 67" fill="none">
					<path d="M124.519 9.51595C120.057 14.994 113.377 21.6875 103.716 27.6809C89.0499 36.7723 74.9012 39.6529 68.9018 40.8444C57.4943 43.1083 45.9416 43.5045 33.6416 41.8632C36.3262 39.072 38.7203 36.5757 41.2029 33.9961C52.1854 34.5531 62.7642 33.5939 72.8967 30.9576C76.2506 30.0848 81.5559 28.5001 87.6899 25.7536C98.6654 20.8445 106.23 14.9225 110.831 10.7462C103.787 9.54276 78.1418 5.91453 51.7923 18.238C18.8944 33.6297 10.8337 61.7618 9.63669 66.2688C6.49883 65.533 3.3716 64.7973 0 64.0049C1.60789 56.8348 4.34908 50.0728 8.46796 43.7935C26.7709 15.9085 54.9975 1.49096 92.8005 0.555603C92.8005 0.555603 104.806 -0.606148 120.705 4.13914C123.995 5.12216 124.664 6.41796 124.852 6.94223C125.217 7.95504 124.831 8.93508 124.519 9.51595Z" fill="#C7C7C7" fill-opacity="0.05"/>
				</svg>
			</div>
			<!-- /.wp-block-acf-apartment-gallery__decor -->			
		</div>
		<!-- /.wp-block-acf-apartment-gallery__benefits -->

		<?php endif; ?>

</section>
