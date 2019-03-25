<?php

get_header();

$verse_text          = get_field('company_verse_text', 'options');
$verse_location      = get_field('company_verse_location', 'options');

$donate_title = get_field( 'donate_title', 'options');
$donate_description = get_field( 'donate_description', 'options');
$donate_link_text = get_field( 'donate_link_text', 'options');
$donate_link_url = get_field( 'donate_link_url', 'options');
$donate_more_text = get_field( 'donate_more_text', 'options' );
$donate_stats = get_field( 'donate_stats', 'options');

?>

<section class="mt-nav flex flex-col lg:flex-row lg:items-end wrapper py-8 lg:pt-jumbo mb-8">
  <div class="lg:w-1/2 lg:pr-8 flex-no-shrink">
    <h2 class="donate-title font-bold font-display uppercase py-8"><?php echo $donate_title; ?></h2>
    <aside class="border-l-4 border-grey pl-6 mb-8 lg:mb-0">
      <p class="text-md leading-normal mb-2"><?php echo $verse_text; ?></p>
      <p class="font-bold leading-normal text-md"><cite class="roman"><?php echo $verse_location; ?></cite></p>
    </aside>
  </div>
  <div class="lg:pl-6">
    <?php if ( ! empty( $donate_stats ) ) : ?>
      <ul class="flex list-reset -mx-6 lg:-mx-8 py-8">
        <?php foreach ( $donate_stats as $stat ) : ?>
          <li class="mx-6 lg:mx-8">
            <p class="font-thin font-bold text-2xl lg:text-3xl mb-2"><?php echo $stat['value']; ?></p>
            <p class="text-sm lg:text-base text-green font-bold"><?php echo $stat['title']; ?></p>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <div class="general-content mb-4"><?php echo $donate_description; ?></div>
    <div>
      <p class="mb-4"><a class="button button--green" href="<?php echo $donate_link_url; ?>"><?php echo $donate_link_text; ?></a></p>
      <p><a class="button-outline" href="#ministries"><?php echo ! empty( $donate_more_text ) ? $donate_more_text : 'Choose A Specific Ministry'; ?></a></p>
    </div>
    <div><a href=""></a><a href=""></a></div>
  </div>
</section>
<section id="ministries" class="py-8 lg:py-jumbo wrapper">
  <h3 class="uppercase font-display font-bold text-center text-lg lg:text-2xl pt-4 pb-8">Our Ministries</h3>
  <?php if ( have_posts() ) : ?>
    <ul class="flex flex-col md:flex-row md:flex-wrap list-reset md:-mx-2">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php
        $category = get_main_category( get_the_ID() );
        $color = secondmile_get_color( strtolower( $category ), 'rgb' );
        $bg = get_field( 'ministry_image' );
        $donate_link = get_field( 'donation_link_url' );
      ?>
      <li class="donate-item bg-cover bg-center text-white rounded mb-4 md:mx-2 p-8" style="background-image: linear-gradient( rgba(<?php echo $color; ?>, 0.83), rgba(<?php echo $color; ?>, 0.83) ), url('<?php echo $bg['sizes']['medium_large']; ?>');">
        <p class="uppercase font-display font-bold mb-8"><strong><?php echo $category; ?></strong></p>
        <h2 class="uppercase font-display font-bold text-lg py-4"><?php the_title(); ?></h2>
        <p class="m-0"><a class="font-bold uppercase text-white hover:no-underline" href="<?php echo $donate_link; ?>">Donate Now</a></p>
      </li>
    <?php endwhile; ?>
    </ul>
  <?php else: ?>
    <p>Sorry, no posts matched your criteria.</p>
  <?php endif; ?>
</section>

<?php get_footer();
