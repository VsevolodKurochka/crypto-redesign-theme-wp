<section class="vcontact-form">
	<div class="vcontact-form__container vcontainer">
		<div class="vcontact-form__row vrow">
			<div class="vcontact-form__column vcontact-form__column_text vcol-12 vcol-sm-6">
				<div class="vcontact-form__content">
					<p class="vcontact-form__content-title">
						<?php 
							if(get_locale() == 'ru_RU'): 
								_e('<span class="color-brand-1">Получите консультацию о проектах</span> сообщества, заполнив форму справа', 'crypto');
							else:
								_e('<span class="color-brand-1">Get advice on community projects</span> by filling out the form on the right', 'crypto');
							endif;
						?>
					</p>
					<div class="vcontact-form__info">
						<?php if(get_option('phone')) : ?>
						<div class="vcontact-form__info-item vcontact-form__info-item_phone"><a href="<?php echo get_option('phone'); ?>"><?php echo get_option('phone') ?></a></div>
						<?php endif; ?>
						<?php if(get_option('city') || get_option('city_en')) : ?>
							<div class="vcontact-form__info-item vcontact-form__info-item_map">
								<p>
									<?php 
										if(get_locale() == 'ru_RU'): 
											echo get_option('city');
										else:
											echo get_option('city_en');
										endif;
									?>
								</p>
							</div>
						<?php endif; ?>
					</div>
					<div class="vcontact-form__social">
						<?php if(get_option('telegram')) : ?>
							<div class="vcontact-form__social-item">
								<a href="<?php echo get_option('telegram'); ?>" class="btn vcontact-form__social-item-btn vcontact-form__social-item-btn_telegram" target="_blank">
									<?php 
										if(get_locale() == 'ru_RU'): 
											_e('Подписывайтесь на<br>наш <span>Telegram-канал</span>');
										else:
											_e('Subscribe to <br> our <span> Telegram-channel </span>', 'crypto');
										endif;
									?>
									<i class="vcontact-form__social-item-btn-icon vfa vfa-telegram"></i>
								</a>
							</div>
						<?php endif; ?>
						<?php if(get_option('youtube')) : ?>
							<div class="vcontact-form__social-item">
								<a href="<?php echo get_option('youtube'); ?>" class="btn vcontact-form__social-item-btn vcontact-form__social-item-btn_youtube" target="_blank">
									<?php 
										if(get_locale() == 'ru_RU'): 
											_e('Смотрите обучающие уроки на нашем <span>Youtube-канале</span>', 'crypto');
										else:
											_e('See the tutorials on our <span>Youtube-chanel</span>', 'crypto');
										endif;
									?>
									<i class="vcontact-form__social-item-btn-icon vfa vfa-youtube-play"></i>
								</a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="vcontact-form__column vcontact-form__column_phone vcol-12 vcol-sm-6">
				<div class="vcontact-form__phone">
					<img class="vcontact-form__phone-img" src="<?php echo get_template_directory_uri(); ?>/img/iphone.png" alt="" role="presentation"/>
					<div class="vcontact-form__phone-body">
						<p class="vcontact-form__phone-body-title">
							<?php 
								if(get_locale() == 'ru_RU') :
									_e('Заполните контактную форму');
								else:
									_e('Fill out the contact form');
								endif;
							?>
						</p>
						<?php 
							if(get_locale() == 'ru_RU') :
								echo do_shortcode('[form path="SiteConsultation" id="_form_7_" button_text="Отправить" name="true" phone="true" class="block"]');
							else:
								echo do_shortcode('[form path="SiteConsultation" id="_form_7_" button_text="Send" name="true" phone="true" class="block"]');
							endif;
						?>
						<?php  ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>