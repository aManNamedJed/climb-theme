<?php get_header();  ?>
<?php 
    /**
     * Set $climb variable to the current post for legibility
     */
    $climb = $post; 
?>

<div class="container py-5">
    <div id="climb-profile">
        <div class="profile-header mb-5">
            <div class="row">
                <div class="col-lg-4">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="float-left img-fluid">
                    
                    <!-- <div class="climb-info px-3 float-left">
                        <h1 class="h5 mb-1"><?php echo $climber->display_name; ?></h1>
                        <p class="text-muted">Joined <?php echo App\Climber::member_since($climber); ?></p>
                    </div> -->

                </div>
                <div class="col-lg-8">
                    <div class="card-deck">

                        <div class="card bg-light border-0 rounded-0">
                            <div class="card-body text-center">
                                <p class="small text-muted">Total Attempts</p>
                                <p class="display-4">
                                    <?php echo App\Climb::attempt_count($climb); ?>
                                </p>
                            </div>
                        </div>
                        <div class="card bg-light border-0 rounded-0">
                            <div class="card-body text-center">
                                <p class="small text-muted">Success Rate</p>
                                <p class="display-4">
                                <?php echo App\Climb::success_rate($climb); ?>                                    
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- <p class="text-muted">
                        <?php echo get_the_author_meta('description', $climber->ID ); ?>
                    </p> -->
                </div>
            </div>
        </div>
        <div class="profile-stats mb-4">
  
        </div>

        <?php 
            $attempts_query = new WP_Query([
                'post_type' => 'attempt',
                'meta_key'  => 'attempt_climb',
                'meta_value'  => get_the_ID(),
                'posts_per_page' => -1,
            ]);
        ?>

        <h2 class="mb-4">Recent Attempts</h2>

            <?php if( $attempts_query->have_posts() ): ?>
            
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Climber</th>
                        <th>Success</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($attempts_query->have_posts()): ?>
                        <?php $attempts_query->the_post(); ?>
                            <?php $climber = get_field('attempt_climber'); ?>
                            <?php $climber = get_user_by('id', $climber); ?>

                            <tr>
                                <td>
                                    <a href="/climbers/<?php echo $climber->user_nicename; ?>">
                                        <?php echo $climber->display_name; ?>
                                    </a>
                                </td>
                                <td>
                                    <?php if( get_field('attempt_success') ): ?>
                                        <span>Yes</span>
                                    <?php else: ?>
                                        <span>No</span>
                                    <?php endif; ?>
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

