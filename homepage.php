<?php
/**
* Template Name: Home Page Template
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
get_header();
global $themeoption;
?>
<div id="contact">
	<?php
	$pageTitle = get_post_meta(get_the_ID(), '_pagetitle', true);
	$pageContent = get_post_meta(get_the_ID(), '_pagecontent', true);
	$contactTitle = get_post_meta(get_the_ID(), '_contacttitle', true);
	$contactForm = get_post_meta(get_the_ID(), '_contactform', true);
	$reachusTitle = get_post_meta(get_the_ID(), '_reachustitle', true);
	$reachusEditor = get_post_meta(get_the_ID(), '_reachus_editor', true);
	?>
	<h3 class="contact-title"><?php echo $pageTitle; ?></h3>
	<p class="contact-desc"><?php the_content(); ?></p>

	<div id="contact-details">
		<div class="contact-details">
			<h4 class="bordered-title"><?php echo $contactTitle; ?></h4>
			<?php 
			if(!empty($contactForm)) {
				echo do_shortcode( $contactForm );
			}
			?>
		</div>
		<div class="contact-details">
			<h4 class="bordered-title"><?php echo $reachusTitle; ?></h4>
			<?php echo $contactTitle; ?>
			<?php if(!empty($themeoption['address'])) {
				echo $themeoption['address'];
			} ?>
			<br/>
			<?php if(!empty($themeoption['phone'])) { ?>
				<p>Phone: <?php echo $themeoption['phone']; ?></p>
			<?php } ?>	
			<?php if(!empty($themeoption['fax'])) { ?>
				<p>Fax: <?php echo $themeoption['fax']; ?></p>
			<?php } ?>
			<div class="contact-icons">
				<?php if(!empty($themeoption['facebook'])) { ?>
					<a href="<?php echo $themeoption['facebook']; ?>" class="icon-holder">
						<svg height="100%" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M374.244,285.825l14.105,-91.961l-88.233,0l0,-59.677c0,-25.159 12.325,-49.682 51.845,-49.682l40.116,0l0,-78.291c0,0 -36.407,-6.214 -71.213,-6.214c-72.67,0 -120.165,44.042 -120.165,123.775l0,70.089l-80.777,0l0,91.961l80.777,0l0,222.31c16.197,2.541 32.798,3.865 49.709,3.865c16.911,0 33.511,-1.324 49.708,-3.865l0,-222.31l74.128,0Z" style="fill: #FFFFFF;"/></svg>
					</a>
				<?php } ?>

				<?php if(!empty($themeoption['twitter'])) { ?>
					<a href="<?php echo $themeoption['twitter']; ?>" class="icon-holder">
						<svg enable-background="new 0 0 32 32" width="100%" height="100%" id="Layer_1" version="1.0" viewBox="0 0 32 32"  xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M31.993,6.077C30.816,6.6,29.552,6.953,28.223,7.11c1.355-0.812,2.396-2.098,2.887-3.63  c-1.269,0.751-2.673,1.299-4.168,1.592C25.744,3.797,24.038,3,22.149,3c-3.625,0-6.562,2.938-6.562,6.563  c0,0.514,0.057,1.016,0.169,1.496C10.301,10.785,5.465,8.172,2.227,4.201c-0.564,0.97-0.888,2.097-0.888,3.3  c0,2.278,1.159,4.286,2.919,5.464c-1.075-0.035-2.087-0.329-2.972-0.821c-0.001,0.027-0.001,0.056-0.001,0.082  c0,3.181,2.262,5.834,5.265,6.437c-0.55,0.149-1.13,0.23-1.729,0.23c-0.424,0-0.834-0.041-1.234-0.117  c0.834,2.606,3.259,4.504,6.13,4.558c-2.245,1.76-5.075,2.811-8.15,2.811c-0.53,0-1.053-0.031-1.566-0.092  C2.905,27.913,6.355,29,10.062,29c12.072,0,18.675-10.001,18.675-18.675c0-0.284-0.008-0.568-0.02-0.85  C30,8.55,31.112,7.395,31.993,6.077z" fill="#FFFFFF"/><g/><g/><g/><g/><g/><g/></svg>
					</a>
				<?php } ?>	

				<?php if(!empty($themeoption['linkedin'])) { ?>
					<a href="<?php echo $themeoption['linkedin']; ?>" class="icon-holder">
						<svg baseProfile="tiny" width="100%" height="100%" id="Layer_1" version="1.2" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M8,19H5V9h3V19z M19,19h-3v-5.342c0-1.392-0.496-2.085-1.479-2.085c-0.779,0-1.273,0.388-1.521,1.165C13,14,13,19,13,19h-3   c0,0,0.04-9,0-10h2.368l0.183,2h0.062c0.615-1,1.598-1.678,2.946-1.678c1.025,0,1.854,0.285,2.487,1.001   C18.683,11.04,19,12.002,19,13.353V19z" fill="#FFFFFF"/></g><g><ellipse cx="6.5" cy="6.5" rx="1.55" ry="1.5" fill="#FFFFFF"/></g></svg>
					</a>
				<?php } ?>

				<?php if(!empty($themeoption['pintrest'])) { ?>
					<a href="<?php echo $themeoption['pintrest']; ?>" class="icon-holder">
						<svg enable-background="new 0 0 56.693 56.693" width="100%" height="100%" id="Layer_1" version="1.1" viewBox="0 0 56.693 56.693" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M30.374,4.622c-13.586,0-20.437,9.74-20.437,17.864c0,4.918,1.862,9.293,5.855,10.922c0.655,0.27,1.242,0.01,1.432-0.715  c0.132-0.5,0.445-1.766,0.584-2.295c0.191-0.717,0.117-0.967-0.412-1.594c-1.151-1.357-1.888-3.115-1.888-5.607  c0-7.226,5.407-13.695,14.079-13.695c7.679,0,11.898,4.692,11.898,10.957c0,8.246-3.649,15.205-9.065,15.205  c-2.992,0-5.23-2.473-4.514-5.508c0.859-3.623,2.524-7.531,2.524-10.148c0-2.34-1.257-4.292-3.856-4.292  c-3.058,0-5.515,3.164-5.515,7.401c0,2.699,0.912,4.525,0.912,4.525s-3.129,13.26-3.678,15.582  c-1.092,4.625-0.164,10.293-0.085,10.865c0.046,0.34,0.482,0.422,0.68,0.166c0.281-0.369,3.925-4.865,5.162-9.359  c0.351-1.271,2.011-7.859,2.011-7.859c0.994,1.896,3.898,3.562,6.986,3.562c9.191,0,15.428-8.379,15.428-19.595  C48.476,12.521,41.292,4.622,30.374,4.622z" fill="#FFFFFF"/></svg>
					</a>
				<?php } ?>	
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>