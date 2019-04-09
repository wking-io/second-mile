<?php

get_header(); 

$ministry_subtitle = get_field( 'ministry_subtitle' );
$ministry_image = get_field( 'ministry_image' );
$ministry_donation_url = get_field( 'donation_link_url' );
$ministry_donation_text = get_field( 'donation_link_text' );
$ministry_stat = get_field( 'ministry_stat' );

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php 
    $ministry_category = get_main_category( get_the_ID(), 'category' ); 
    $ministry_color = secondmile_get_color( strtolower( $ministry_category ) );
  ?>
  <section class="ministry-bg bg-no-repeat bg-cover bg-fixed bg-<?php echo $ministry_color; ?> text-white min-h-screen">
    <div class="wrapper py-nav flex flex-col justify-center min-h-screen" data-fade-in>
      <h3 class="pt-jumbo uppercase font-display font-bold mb-4 lg:text-md"><?php echo $ministry_category; ?></h3>
      <h2 class="font-display uppercase font-bold text-xl leading-normal mb-6 md:text-3xl lg:text-4xl md:w-4/5"><?php echo the_title(); ?></h2>
      <p class="ministry-subtitle leading-normal border-l-4 pl-4 text-md md:text-lg md:w-4/5 mb-8"><?php echo $ministry_subtitle; ?></p>
      <div class="flex flex-col md:flex-row md:py-8">
        <?php if ( ! empty( $ministry_stat ) ) : ?>
          <div class="pt-2 mb-8 md:flex md:flex-col md:items-center md:justify-center md:pt-0 md:mb-3 md:text-center flex-no-shrink w-2/5 max-w-3xl">
            <p class="font-thin font-bold uppercase text-4xl md:text-5xl mb-2"><?php echo $ministry_stat['value']; ?></p>
            <p class="md:text-md font-bold md:text-md"><?php echo $ministry_stat['title']; ?></p>
          </div>
        <?php endif; ?>
        <div>
          <div class="general-content mb-8"><?php the_content(); ?></div>
          <p><a class="button-light button-light--<?php echo $ministry_color; ?>" href="<?php echo $ministry_donation_url; ?>"><?php echo $ministry_donation_text; ?></a></p>
        </div>
      </div>
    </div>
  </section>
<?php endwhile; else: ?>
  <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>

<?php get_footer();