<section class="vcontact-form">
	<div class="vcontact-form__container vcontainer">
		<div class="vcontact-form__row vrow">
			<div class="vcontact-form__column vcontact-form__column_text vcol-12 vcol-sm-6">
				<div class="vcontact-form__content">
					<p class="vcontact-form__content-title">
						<?php 
							if(get_locale() == 'ru_RU'): 
								_e('<span class="color-brand-1">Контакты</span>', 'crypto');
							else:
								_e('<span class="color-brand-1">Contacts</span>', 'crypto');
							endif;
						?>
					</p>
					<div class="vcontact-form__cloud">
						<?php 
							if(get_locale() == 'ru_RU'): 
								_e('<p>Буду сопровождать вас на всех этапах работы, заботиться о своевременных выплатах и содействовать развитию партнерства.</p><p class="color-brand-1">Если у вас возникли вопросы о сотрудничестве, пожалуйста, обращайтесь ко мне!</p>', 'crypto');
							else:
								_e('<p>I will accompany you at all stages of work, take care of timely payments and promote the development of partnership.</p><p class="color-brand-1">If you have any questions about cooperation, please feel free to contact me!</p>', 'crypto');
							endif;
						?>
					</div>
					<div class="vcontact-form__modal-text">
						<!-- Look at jquery.main.js -->
						<!-- We take data-class-id from invisible block -->
						<?php 
							if( get_locale() == 'ru_RU' ) : 
								_e('<p>Подробные условия партнёрской программы читайте <span class="js-vcontact-form__modal-text overlay-show" data-overlay-class="overlay-cornerbottomleft">здесь</span>.</p>', 'crypto');
							else:
								_e('<p>Detailed terms of the affiliate program can be found <span class="js-vcontact-form__modal-text overlay-show" data-overlay-class="overlay-cornerbottomleft">here</span>.', 'crypto');
							endif;
						?>
					</div>
				</div>
			</div>
			<div class="vcontact-form__column vcontact-form__column_phone vcol-12 vcol-sm-6">
				<div class="vcontact-form__phone">
					<img class="vcontact-form__phone-img" src="<?php echo get_template_directory_uri(); ?>/img/iphone.png" alt="" role="presentation"/>
					<div class="vcontact-form__manager">
						<div class="manager">
							<div class="manager__header">
								<img src="<?php echo get_option('manager_photo') ?>" alt="">
							</div>
							<div class="manager__body">
								<p class="manager__title">
									<?php
									if( get_locale() == 'ru_RU' ) : 
										echo get_option('manager_name');
									else:
										echo get_option('manager_name_en');
									endif;?>
								</p>
								<p class="manager__position">
									<?php
									if( get_locale() == 'ru_RU' ) : 
										echo get_option('manager_position');
									else:
										echo get_option('manager_position_en');
									endif;?>
								</p>
								<a class="manager__phone" href="<?php echo get_option('manager_phone'); ?>">
									<?php echo get_option('manager_phone'); ?>
								</a>
								<p class="manager__telegram">
									<i class="manager__telegram-icon vfa vfa-telegram"></i>
									<?php echo get_option('manager_telegram'); ?>
								</p>
								<a class="manager__envelope" href="<?php echo get_option('manager_envelope'); ?>">
									<?php echo get_option('manager_envelope'); ?>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>