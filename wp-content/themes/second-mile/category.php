<?php

get_header();

$category = get_queried_object();

$category_title = get_field( $category->slug . '_title', 'options' );
$category_subtitle = get_field( $category->slug . '_subtitle', 'options' );
$category_description = get_field( $category->slug . '_description', 'options' );
$category_has_video = get_field( $category->slug . '_has_video', 'options' );
$category_color = secondmile_get_color( $category->slug );

?>

<?php if ( have_posts() ) : ?>
  <section class="wrapper mt-nav pt-jumbo pb-8" data-fade-in>
    <h3 class="text-<?php echo $category_color; ?> uppercase font-display font-bold mb-4 lg:text-md"><?php echo $category->name; ?></h3>
    <h2 class="font-display uppercase font-bold text-xl leading-normal mb-6 md:text-3xl lg:text-4xl md:w-4/5"><?php echo $category_title; ?></h2>
    <p class="leading-normal border-l-4 border-grey pl-4 text-md md:text-lg md:w-4/5 lg:w-3/5 mb-8"><?php echo $category_subtitle; ?></p>
    <div class="flex flex-col lg:flex-row <?php echo $category_has_video ? 'pt-6 lg:items-center' : ''; ?>">
      <?php if ( $category_has_video ) :
        $thumb = get_field( $category->slug . '_video_thumbnail', 'options' ); ?>
        <div class="category-video mb-8 lg:mb-0 lg:mr-8 rounded overflow-hidden flex-no-shrink">
          <button data-popup-action aria-controls="the-video">
            <img src="<?php echo $thumb['url']; ?>" alt="video thumbnail">
            <svg class="play-button" width="43" height="48" viewBox="0 0 43 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M41 20.5359C43.6667 22.0755 43.6667 25.9245 41 27.4641L6.5 47.3827C3.83333 48.9223 0.5 46.9978 0.5 43.9186V4.08141C0.5 1.00221 3.83333 -0.922287 6.5 0.617313L41 20.5359Z" fill="white"/>
            </svg>
          </button>
        </div>
      <?php endif; ?>
      <div class="general-content <?php echo $category_has_video ? '' : 'md:columns-2 md:column-gap-8'; ?>"><?php echo $category_description; ?></div>
    </div>
  </section>
  <section class="wrapper pt-8 md:pt-jumbo pb-jumbo" data-fade-in>
    <h3 class="uppercase font-display font-bold text-center text-lg md:text-xl lg:text-2xl mb-8 md:pb-4 lg:pb-8"><?php echo $category->name; ?> Ministries</h3>
    <ul class="list-reset flex flex-col md:flex-row md:flex-wrap md:-mx-4">
      <?php while ( have_posts() ) : the_post(); ?>
      <?php
        $ministry_image = get_field( 'ministry_image' );
        $ministry_excerpt = get_field( 'ministry_excerpt' );
      ?>
        <li class="w-full md:w-1/2 md:px-4 mb-8">
          <a class="block mb-8 aspect-5:3 overflow-hidden" href="<?php the_permalink(); ?>"><img class="absolute pin-t pin-l w-full" src="<?php echo $ministry_image['sizes']['medium_large']; ?>" alt=""></a>
          <h4 class="font-display font-bold text-md uppercase mb-2"><?php the_title(); ?></h4>
          <div class="font-serif text-body leading-normal mb-4"><?php echo $ministry_excerpt; ?></div>
          <p class="mb-6"><a class="font-bold uppercase text-<?php echo $category_color; ?> hover:no-underline" href="<?php the_permalink(); ?>">Learn More</a></p>
        </li>
      <?php endwhile; ?>
    </ul>
  </section>

  <?php if ( $category_has_video ) :
    $category_video = get_field( $category->slug . '_video', 'options' ); ?>
    <aside id="the-video" data-popup data-popup-hidden="true">
      <div class="popup-bg" aria-controls="the-video" data-popup-action></div>
      <div class="video-content">
        <?php echo $category_video; ?>
      </div>
    </aside>
  <?php endif; ?>
<?php else: ?>
  <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>

<?php get_footer();