<section id="banner" class="mb-80">
	<?php $banner = get_field('banner'); ?>
	<div class="d-none d-lg-block">
		<?php $p = $banner['photo-dk']; ?>
		<img src="<?php echo $p['url']; ?>" alt="Banner" width="<?php echo $p['width']; ?>" height="<?php echo $p['height']; ?>">
	</div>
	<div class="d-block d-lg-none">
		<?php $p = $banner['photo-mb']; ?>
		<img src="<?php echo $p['url']; ?>" alt="Banner" width="<?php echo $p['width']; ?>" height="<?php echo $p['height']; ?>">
	</div>
</section>

<section id="introduction" class="mb-80">
	<div class="container">
		<div class="d-flex f-wrap justify-content-center">
			<div class="col-12 col-lg-7 col-xl-6 editor text-center">
				<?php the_field('content-introduction'); ?>
			</div>
		</div>

		<?php $photo = get_field('photo-introduction'); ?>
		<img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['caption']; ?>" width="<?php echo $photo['width']; ?>" height="<?php echo $photo['height']; ?>" loading="lazy">
	</div>
</section>

<section id="about" class="mb-120">
	<div class="container">
		<div class="d-flex f-wrap justify-content-center">
			<div class="col-12 col-lg-7 col-xl-6 editor text-center">
				<?php the_field('content-about'); ?>
			</div>
		</div>
	</div>
</section>

<?php 
$query = new WP_Query([
	'post_type' => 'produto',
	'posts_per_page' => -1,
	'order' => 'DESC',
	'orderby' => 'date'
]);

if ($query->have_posts()) { ?>
<section id="products" class="mb-120">
	<div class="container">
		<div class="editor text-center mb-120">
			<h2>Our products</h2>

			<div class="slider splide" aria-label="Structure carousel of products">
				<div class="splide__track">
					<ul class="splide__list">
					<?php while($query->have_posts()) { ?>
						<?php $query->the_post(); ?>
						<li class="splide__slide">
							<a href="<?php the_permalink(); ?>" class="item d-flex f-direction-column align-items-center justify-content-between">
								<div class="thumb">
									<?php
									if (has_post_thumbnail()) {
										the_post_thumbnail();
									} else {
										?>
										<img src="" alt="" width="" height="" loading="lazy">
										<?php
									}
									?>
								</div>
								<p><?php the_field('description'); ?></p>
								<button type="button" class="background-<?php the_field('color'); ?>"><?php the_title(); ?></button>
							</a>
						</li>
					<?php } wp_reset_postdata(); ?>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<?php $card = get_field('products-card'); ?>

	<div class="d-none d-lg-block">
		<?php $p = $card['photo-dk']; ?>
		<img src="<?php echo $p['url']; ?>" alt="Image card product" width="<?php echo $p['width']; ?>" height="<?php echo $p['height']; ?>" loading="lazy">
	</div>

	<div class="d-block d-lg-none">
		<?php $p = $card['photo-mb']; ?>
		<img src="<?php echo $p['url']; ?>" alt="Image card product" width="<?php echo $p['width']; ?>" height="<?php echo $p['height']; ?>" loading="lazy">
	</div>

</section>
<?php } ?>


<?php 
$query = new WP_Query([
	'post_type' => 'post',
	'posts_per_page' => -1,
	'order' => 'DESC',
	'orderby' => 'date'
]);

if ($query->have_posts()) { ?>
<section id="blog" class="mb-120">
	<div class="container">
		<div class="editor text-center">
			<h2>Keep up to date with our discoveries</h2>

			<div class="slider splide" aria-label="Structure carousel of posts">
				<div class="splide__track">
					<ul class="splide__list">
					<?php while($query->have_posts()) { ?>
						<?php $query->the_post(); ?>
						<li class="splide__slide">
							<a href="<?php the_permalink(); ?>" class="item">
								<div class="thumb">
									<?php the_post_thumbnail(); ?>
								</div>
								<p><?php the_title(); ?></p>
							</a>
						</li>
					<?php } ?>
					</ul>
				</div>
			</div>
		</div>

		<div class="wrapper-btn d-flex f-wrap justify-content-center">
			<a href="#" class="col-sm-4 btn">See more</a>
		</div>
	</div>
</section>

<?php } wp_reset_postdata(); ?>