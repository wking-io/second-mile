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

<section>
  <div>
    <div><img src="" alt=""></div>
    <div><img src="<?php echo $ministry_image['url']; ?>" alt=""></div>
  </div>
  <div>
    <?php if ( ! empty( $ministry_stat ) ) : ?>
      <div>
        <p><?php echo $ministry_stat['value']; ?></p>
        <p><?php echo $ministry_stat['title']; ?></p>
      </div>
    <?php endif; ?>
    <p><?php echo $ministry_subtitle; ?></p>
    <div><?php the_content(); ?></div>
    <p><a href="<?php echo $ministry_donation_url; ?>"><?php echo $ministry_donation_text; ?></a></p>
  </div>
</section>

<?php if ( ! empty( $ministry_testimonial ) ) : ?>
  <section>
    <blockquote>
      <svg></svg>
      <div><?php echo $ministry_testimonial['quote']; ?></div>
      <p>- <cite><?php echo $ministry_testimonial['source']; ?></cite> -</p>
    </blockquote>
  </section>
<?php endif; ?>

<?php if ( ! empty( $ministry_highlights ) ) : ?>
  <section>
    <h3><?php echo $ministry_highlights_title; ?></h3>
    <ul class="list-reset">
      <?php foreach ( $ministry_highlights as $highlight ) : ?>
        <li>
          <img src="<?php echo $highlight['icon'] ?>" alt="">
          <h4><?php echo $highlight['title'] ?></h4>
          <p><?php echo $highlight['description'] ?></p>
        </li>
      <?php endforeach; ?>
    </ul>
    <p><a href="<?php echo $ministry_donation_url; ?>"><?php echo $ministry_bottom_donate_text; ?></a></p>
  </section>
<?php endif; ?>

<?php get_footer();
