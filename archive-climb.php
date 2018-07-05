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
                <h1 class="mb-4">All Climbs</h1>
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
