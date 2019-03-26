<?php

/*
 * Template Name: Parent Party
 * Template Post Type: ministry, post
 */

get_header(); 

$ministry_subtitle = get_field( 'ministry_subtitle' );
$ministry_image = get_field( 'ministry_image' );
$ministry_donation_url = get_field( 'donation_link_url' );
$ministry_donation_text = get_field( 'donation_link_text' );
$ministry_stat = get_field( 'ministry_stat' );
$ministry_testimonial = get_field( 'testimonial' );
$ministry_highlights_title = get_field( 'highlights_title' );
$ministry_highlights = get_field( 'highlights' );
$ministry_bottom_donate_text = get_field( 'bottom_donate_button_text' );

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <section class="mt-nav flex flex-col lg:flex-row lg:items-end lg:pb-jumbo lg:py-8">
    <div class="mb-4 sm:mb-8 lg:w-1/2 lg:mr-8 lg:mb-0 flex flex-col lg:flex-col-reverse lg:justify-end lg:flex-no-shrink">
      <div class="aspect-5:3 overflow-hidden sm:mb-8"><img class="w-full absolute pin-t pin-l" src="<?php echo $ministry_image['url']; ?>" alt=""></div>
      <div class="wrapper lg:w-full lg:max-w-5xl lg:mr-0 lg:ml-auto my-8"><div class="w-4/5 max-w-4xl lg:max-w-full lg:w-full"><?php echo secondmile_pp_logo( 'vertical' ); ?></div></div>
    </div>
    <div class="wrapper lg:px-8 lg:max-w-6xl mx-auto">
      <?php if ( ! empty( $ministry_stat ) ) : ?>
        <div class="mb-8">
          <p class="font-thin font-bold text-2xl lg:text-3xl mb-2"><?php echo $ministry_stat['value']; ?></p>
          <p class="text-green font-bold"><?php echo $ministry_stat['title']; ?></p>
        </div>
      <?php endif; ?>
      <p class="leading-normal border-l-4 border-grey pl-4 text-md md:text-lg lg:text-xl md:w-4/5 lg:w-full lg:max-w-5xl mb-8"><?php echo $ministry_subtitle; ?></p>
      <div class="general-content mb-8"><?php the_content(); ?></div>
      <p><a class="button button--red" href="<?php echo $ministry_donation_url; ?>"><?php echo $ministry_donation_text; ?></a></p>
    </div>
  </section>

  <?php if ( ! empty( $ministry_testimonial ) ) : ?>
    <section class="bg-yellow-pale py-jumbo my-jumbo">
      <blockquote class="text-center wrapper">
        <div class="w-16 mx-auto mb-3">
          <svg viewBox="0 0 40 34" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.2727 34H0V25.5758C0 20.2828 0.646465 15.7172 1.93939 11.8788C3.27273 8 5.49495 4.0404 8.60606 0L14.5455 4.66667C13.0505 6.84848 11.9394 8.72727 11.2121 10.303C10.5253 11.8788 9.83838 13.9798 9.15152 16.6061H15.2727V34ZM40 34H24.7273V25.5758C24.7273 20.2828 25.3737 15.7172 26.6667 11.8788C27.9596 8 30.1818 4.0404 33.3333 0L39.2727 4.66667C37.7778 6.84848 36.6667 8.72727 35.9394 10.303C35.2525 11.8788 34.5657 13.9798 33.8788 16.6061H40V34Z" fill="#F9A02D"/>
          </svg>
        </div>

        <div class="font-serif sm:text-md lg:text-lg w-4/5 mx-auto leading-normal mb-8 pt-4"><?php echo $ministry_testimonial['quote']; ?></div>
        <p class="lg:text-md font-display font-bold uppercase text-yellow">- <cite class="roman"><?php echo $ministry_testimonial['source']; ?></cite> -</p>
      </blockquote>
    </section>
  <?php endif; ?>

  <?php if ( ! empty( $ministry_highlights ) ) : ?>
    <section class="wrapper mb-jumbo">
      <h3 class="uppercase font-display font-bold text-center text-lg md:text-xl mb-8 pb-8"><?php echo $ministry_highlights_title; ?></h3>
      <ul class="list-reset flex flex-row flex-wrap items-center justify-center -mx-4">
        <?php foreach ( $ministry_highlights as $highlight ) : ?>
          <li class="pb-8 mb-8 px-4 text-center min-w-2xl max-w-4xl">
            <img class="mb-6" src="<?php echo $highlight['icon'] ?>" alt="">
            <h4 class="text-md font-display font-bold uppercase mb-3"><?php echo $highlight['title'] ?></h4>
            <div class="font-serif leading-normal"><?php echo $highlight['description'] ?></div>
          </li>
        <?php endforeach; ?>
      </ul>
      <p class="mb-8"><a class="button-outline w-full sm:w-4/5 md:w-1/2 mx-auto" href="<?php echo $ministry_donation_url; ?>"><?php echo $ministry_bottom_donate_text; ?></a></p>
    </section>
  <?php endif; ?>

<?php endwhile; else: ?>
  <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
<?php get_footer();
