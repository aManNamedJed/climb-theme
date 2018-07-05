<?php
/**
 * Template Name: Climber Profile
 */
get_header(); ?>

<?php $climber_username = $wp_query->query_vars['climber_username']; ?>
<?php $climber = get_user_by('login', $climber_username); ?>

<div class="container py-5">
    <div id="climber-profile">
        <div class="profile-header mb-5">
            <div class="row">
                <div class="col-lg-6">
                    <img src="<?php echo get_avatar_url( $climber ); ?>" alt="<?php echo $climber->display_name; ?>" class="float-left">
                    <h1 class="d-inline-block float-left ml-3"><?php echo $climber->display_name; ?></h1>
                </div>
                <div class="col-lg-6"></div>
            </div>
        </div>

        <?php 
            $attempts_query = new WP_Query([
                'post_type' => 'attempt',
                'meta_key'  => 'attempt_climber',
                'meta_value'  => $climber->ID,
            ]);
        ?>

        <h2>Recent Attempts</h2>

            <?php if( $attempts_query->have_posts() ): ?>
            
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Climb</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($attempts_query->have_posts()): ?>
                        <?php $attempts_query->the_post(); ?>
                            <?php $climb = get_field('attempt_climb'); ?>

                            <tr>
                                <td>
                                    <a href="<?php echo get_permalink($climb); ?>">
                                        <?php echo $climb->post_title; ?>
                                    </a>
                                </td>
                                <td><?php the_field('attempt_date'); ?></td>
                            </tr>
        
                    <?php endwhile; ?>
                </tbody>
            </table>

            <?php else: ?>
            <p class="text-muted">No Recent Attempts</p>
            <?php endif; ?>

    </div>
</div>

<?php get_footer(); ?>