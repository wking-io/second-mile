<?php

get_header();

$category = get_queried_object();

$category_title = get_field( $category->slug . '_title', 'options' );
$category_subtitle = get_field( $category->slug . '_subtitle', 'options' );
$category_description = get_field( $category->slug . '_description', 'options' );
$category_has_video = get_field( $category->slug . '_has_video', 'options' );
$category_video = get_field( $category->slug . '_video', 'options' );
$category_color = secondmile_get_color( $category->slug );

?>

<?php if ( have_posts() ) : ?>
  <section class="wrapper mt-nav pt-jumbo pb-8">
    <h3 class="text-<?php echo $category_color; ?> uppercase font-display font-bold mb-4 lg:text-md"><?php echo $category->name; ?></h3>
    <h2 class="font-display uppercase font-bold text-xl leading-normal mb-6 md:text-3xl lg:text-4xl md:w-4/5"><?php echo $category_title; ?></h2>
    <p class="leading-normal border-l-4 border-grey pl-4 text-md md:text-lg md:w-4/5 lg:w-3/5 mb-8"><?php echo $category_subtitle; ?></p>
    <div class="flex flex-col lg:flex-row">
      <?php if ( $category_has_video ) : ?>
        <div></div>
      <?php endif; ?>
      <div class="general-content md:columns-2 md:column-gap-8"><?php echo $category_description; ?></div>
    </div>
  </section>
  <section class="wrapper pt-8 md:pt-jumbo pb-jumbo">
    <h3 class="uppercase font-display font-bold text-center text-lg md:text-xl lg:text-2xl mb-8 md:pb-4 lg:pb-8"><?php echo $category->name; ?> Ministries</h3>
    <ul class="list-reset flex flex-col md:flex-row md:flex-wrap md:-mx-4">
      <?php while ( have_posts() ) : the_post(); ?>
      <?php
        $ministry_image = get_field( 'ministry_image' );
        $ministry_excerpt = get_field( 'ministry_excerpt' );
      ?>
        <li class="w-full md:w-1/2 md:px-4 mb-8">
          <div class="mb-6"><img src="<?php echo $ministry_image['sizes']['medium_large']; ?>" alt=""></div>
          <h4 class="font-display font-bold text-md uppercase mb-2"><?php the_title(); ?></h4>
          <div class="font-serif leading-normal mb-4"><?php echo $ministry_excerpt; ?></div>
          <p class="mb-6"><a class="font-bold uppercase text-<?php echo $category_color; ?> hover:no-underline" href="<?php the_permalink(); ?>">Learn More</a></p>
        </li>
      <?php endwhile; ?>
    </ul>
  </section>
<?php else: ?>
  <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>

<?php get_footer();