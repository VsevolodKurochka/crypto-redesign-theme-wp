<?php if(get_option('telegram')) : ?>
	<div class="entry-message">
		<a href="<?php echo get_option('telegram') ?>" class="entry-message__link">
			<div class="entry-message__row vrow">
				<div class="entry-message__column entry-message__column_icon vcol-12 vcol-sm-2">
					<img src="<?php echo get_template_directory_uri() ?>/img/icon-telegram.svg" class="entry-message__icon">
				</div>
				<div class="vcol-12 vcol-sm-10">
					<?php if(get_locale() === 'ru_RU') : ?>
						<p>Подпишитесь на наш <span class="entry-message-line">канал в телеграм</span>, чтобы быть в курсе новостей из мира криптовалют</p>
					<?php else : ?>
						<p>Subscribe <span class="entry-message-line">to our channel in telegram</span> to to keep abreast of the news from the world of crypto currency</p>
					<?php endif; ?>
				</div>
			</div>
		</a>
	</div>
<?php endif; ?>