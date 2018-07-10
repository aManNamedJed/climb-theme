<?php get_header();  ?>
<?php 
    /**
     * Set $climb variable to the current post for legibility
     */
    $climb = $post; 
?>

<div class="container py-3">
    <div id="climb-profile">
        <div class="climb-header mb-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="mb-1">
                        <?php the_title(); ?>
                        <small class="text-muted"><?php echo App\Climb::convert_rating( get_field('climb_rating') ); ?></small>
                    </h1>
                    <div class="location mb-4">
                            <?php App\Climb::list_hierarchical_locations($climb); ?>
                    </div>
    </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid">
                    
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-lg btn-block mt-4 mb-1" data-toggle="modal" data-target="#exampleModal">
                        Add an Attempt
                    </button>

                    <button type="button" class="btn btn-sm btn-outline-primary btn-block mb-4">
                        What's this?
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="card-deck px-lg-4">

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

                    <div class="text-muted py-4 px-lg-4">
                        <h2 class="h5 text-dark">Description</h3>
                        <?php the_field('climb_description'); ?>
                    </div>
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
                                <td class="align-middle">
                                    <a href="/climbers/<?php echo $climber->user_nicename; ?>">
                                    <img width="40" src="<?php echo get_avatar_url( $climber); ?>" alt="<?php echo $climber->display_name; ?>" class="rounded-circle mr-1">
                                        <?php echo $climber->display_name; ?>
                                    </a>
                                </td>
                                <td class="align-middle">
                                    <?php if( get_field('attempt_success') ): ?>
                                        <span>Yes</span>
                                    <?php else: ?>
                                        <span>No</span>
                                    <?php endif; ?>
                                </td>
                                <td class="align-middle"><?php the_field('attempt_date'); ?></td>
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

