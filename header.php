<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	
	<nav class="navbar navbar-expand-lg navbar-light bg-dark">
		<div class="container">
			<a class="navbar-brand text-secondary font-weight-bold" href="<?php echo home_url('/'); ?>">Climber Journal</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
	
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
	
				<?php 
					wp_nav_menu([
						'theme_location' => 'primary',
						'menu_class'	 => 'primary-menu navbar-nav mr-auto ml-4',
					]);
				?>
	
			    <ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<?php if(is_user_logged_in()): ?>
							<?php $current_user = wp_get_current_user(); ?>
							<a href="/climbers/<?php echo $current_user->user_login; ?>" class="text-white">
								<img width="40" src="<?php echo get_avatar_url( $current_user); ?>" alt="<?php echo $current_user->display_name; ?>" class="rounded-circle mr-3float-left">
								<?php echo $current_user->display_name; ?>
							</a>
						<?php else: ?>
							<p class="my-0 text-white">
								<a href="/register" class="text-white">Become a Climber</a> or <a href="/login" class="text-white">Sign In</a>
							</p>
						<?php endif; ?>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div id="content" class="site-content">
