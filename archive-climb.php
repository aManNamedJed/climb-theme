<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();
?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main py-5">

			<header class="page-header">
				<h1>All Climbs</h1>
				<a href="/climbs/add" class="btn btn-outline-primary mb-4">Submit a New Climb</a>
			</header><!-- .page-header -->

			<?php
				$climb_query = new WP_Query([
					'post_type'	=> 'climb',
					'posts_per_page' => -1,
				]);
			?>

			<table class="table">
				<thead class="thead-light">
					<tr>
						<th>Name</th>
						<th>Location</th>
						<th>Rating</th>
					</tr>
				</thead>
				<tbody>

					<?php if($climb_query->have_posts()): ?>
						<?php while($climb_query->have_posts()): ?>
						<?php $climb_query->the_post(); ?>
						<tr>
							<td>
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</td>
							<td>
								<?php $locations = wp_get_post_terms( get_the_ID(), 'location', ['orderby' => 'term_id']); ?>
								<?php foreach( $locations as $location ): ?>
									<div class="d-inline-block mr-2">
										<a href="<?php echo get_term_link($location); ?>"><?php echo $location->name; ?></a>
									</div>
								<?php endforeach; ?>
							</td>
							<td><?php echo App\Climb::convert_rating( get_field('climb_rating') ); ?></td>
						</tr>
						<?php endwhile; ?>
					<?php endif; ?>

				</tbody>
			</table>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
