<?php

get_header();

$the_board = get_field( 'board_of_directors' );
$our_dream = get_field( 'dream' );
$ministries     = array(
  array(
    'title'   => 'community',
    'excerpt' => get_field('community_excerpt', 'options'),
    'bg'      => get_field('community_excerpt_image', 'options'),
    'color'   => '22, 169, 169',
  ),
  array(
    'title'   => 'education',
    'excerpt' => get_field('education_excerpt', 'options'),
    'bg'      => get_field('education_excerpt_image', 'options'),
    'color'   => '249, 160, 45',
  ),
  array(
    'title'   => 'family',
    'excerpt' => get_field('family_excerpt', 'options'),
    'bg'      => get_field('education_excerpt_image', 'options'),
    'color'   => '237, 62, 55',
  ),
);

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="mt-nav lg:w-3/5">
    <section class="pt-8">
      <div class="py-8 px-6">
        <h1 class="text-2xl uppercase font-display mb-6"><?php the_title(); ?></h1>
        <div class="general-content"><?php the_content(); ?></div>
      </div>
      <?php if ( ! empty( $ministries ) ) : ?>
        <ul class="ministry-list flex flex-col list-reset text-white lg:fixed lg:pin-r lg:pin-t lg:w-2/5">
          <?php foreach ( $ministries as $index => $data ) : ?>
            <?php if ( ! empty( $data['title'] && ! empty( $data['excerpt'] ) ) ) : ?>
              <li class="ministry-list__item w-full bg-cover bg-center relative p-8 overflow-hidden" style="background-image: linear-gradient( rgba(<?php echo $data['color']; ?>, 0.83), rgba(<?php echo $data['color']; ?>, 0.83) ), url('<?php echo $data['bg']['url']; ?>');">
                <p class="font-display leading-none absolute pin-t pin-l -mt-1 -ml-6 lg:-ml-8 opacity-25 ministry-count">0<?php echo $index + 1; ?></p>
                <div>
                  <h2 class="uppercase font-display text-md mb-3 lg:mb-8 tracking-wide"><?php echo $data['title']; ?></h2>
                  <div class="leading-normal mb-6 md:text-md lg:text-lg lg:mb-jumbo"><?php echo $data['excerpt']; ?></div>
                  <p class="lg:mb-8"><a class="font-bold uppercase text-white hover:no-underline" href="<?php echo site_url( '/category/' . $data['title'] ); ?>">View <?php echo $data['title']; ?></a></p>
                </div>
              </li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </section>
    <?php if ( ! empty( $the_board ) ) : ?>
      <section class="bg-black text-white py-8">
        <h2 class="board-title font-display uppercase mb-6 -ml-3">Board Of Directors</h2>
        <ul class="list-reset flex flex-wrap w-9/10 mx-auto">
          <?php foreach ( $the_board as $member ) : ?>
            <li class="w-1/2 md:w-1/3 mb-4"><?php echo $member['board_member']; ?></li>
          <?php endforeach; ?>
        </ul>
      </section>
    <?php endif; ?>
    <?php if ( ! empty( $our_dream ) ) : ?>
      <section class="p-8 text-center">
        <h2 class="text-xl font-display uppercase mb-6 pt-8"><?php echo $our_dream['title']; ?></h2>
        <div class="leading-normal font-serif mb-8"><?php echo $our_dream['description']; ?></div>
        <ul class="list-reset flex justify-center items-end pb-8 -mx-4 sm:-mx-8">
          <?php foreach ( $our_dream['stats'] as $i => $stat ) : ?>
            <li class="px-4 sm:px-8">
              <p class="font-thin font-bold uppercase <?php echo 1 == $i ? 'text-4xl md:text-5xl text-green' : 'text-2xl md:text-3xl'; ?> mb-3"><?php echo $stat['stat_value']; ?></p>
              <p class="text-xs sm:text-sm font-bold md:text-md"><?php echo $stat['stat_title']; ?></p>
            </li>
          <?php endforeach; ?> 
        </ul>
        <p class="pt-8"><a class="button-outline button-outline--green" href="<?php echo $our_dream['page_link']; ?>"><?php echo $our_dream['page_link_text']; ?></a></p>
      </section>
    <?php endif; ?>
  </div>
<?php endwhile; else: ?>
  <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>

<?php get_footer();