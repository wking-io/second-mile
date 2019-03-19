<?php

get_header(); 

$ministry_subtitle = get_field( 'ministry_subtitle' );
$ministry_image = get_field( 'ministry_image' );
$ministry_donation_url = get_field( 'donation_link_url' );
$ministry_donation_text = get_field( 'donation_link_text' );
$ministry_stat = get_field( 'ministry_subtitle' );

function get_color( $category_name = '' ) {
  if ( 'community' == $category_name ) :
    return 'green';
  elseif ( 'education' == $category_name ) :
    return 'yellow';
  elseif ( 'family' == $category_name ) :
    return 'red';
  endif;

  return 'green';
}

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php $ministry_category = get_main_category( get_the_ID(), 'category' ); ?>
  <section class="ministry-bg bg-<?php echo get_color( $ministry_category ); ?> text-white">
    <h3><?php echo $ministry_category; ?></h3>
    <h2><?php echo the_title(); ?></h2>
    <p><?php echo $ministry_subtitle; ?></p>
    <div>
      <?php if ( ! empty( $ministry_stat ) ) : ?>
        <div>
          <p><?php echo $ministry_stat['value']; ?></p>
          <p><?php echo $ministry_stat['title']; ?></p>
        </div>
      <?php endif; ?>
      <div>
        <div><?php the_content(); ?></div>
        <p><a href="<?php echo $ministry_donation_url; ?>"><?php echo $ministry_donation_text; ?></a></p>
      </div>
    </div>
  </section>
<?php endwhile; else: ?>
  <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>

<?php get_footer();