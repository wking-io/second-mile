<?php

get_header();

$category = get_queried_object();

$category_title = get_field( $category->slug . '_title', 'options' );
$category_subtitle = get_field( $category->slug . '_subtitle', 'options' );
$category_description = get_field( $category->slug . '_description', 'options' );
$category_has_video = get_field( $category->slug . '_has_video', 'options' );
$category_video = get_field( $category->slug . '_video', 'options' );

?>

<?php if ( have_posts() ) : ?>
  <section class="wrapper">
    <h3><?php echo $category->name; ?></h3>
    <h2><?php echo $category_title; ?></h2>
    <p><?php echo $category_subtitle; ?></p>
    <div>
      <?php if ( $category_has_video ) : ?>
        <div></div>
      <?php endif; ?>
      <div><?php echo $category_description; ?></div>
    </div>
  </section>
  <section class="wrapper">
    <h3><?php echo $category->name; ?> Ministries</h3>
    <ul class="list-reset flex flex-wrap -mx-4">
      <?php while ( have_posts() ) : the_post(); ?>
      <?php
        $ministry_image = get_field( 'ministry_image' );
        $ministry_excerpt = get_field( 'ministry_excerpt' );
      ?>
        <li class="grid-child w-1/2 px-4 mb-8">
          <div><img src="<?php echo $ministry_image['sizes']['medium_large']; ?>" alt=""></div>
          <h4><?php the_title(); ?></h4>
          <p><?php echo $ministry_excerpt; ?></p>
          <p><a href="<?php the_permalink(); ?>">Learn More</a></p>
        </li>
      <?php endwhile; ?>
    </ul>
  </section>
<?php else: ?>
  <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>

<?php get_footer();