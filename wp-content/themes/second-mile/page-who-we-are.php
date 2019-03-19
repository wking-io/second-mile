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
  <div>
    <section class="flex">
      <div>
        <h1><?php the_title(); ?></h1>
        <div><?php the_content(); ?></div>
      </div>
      <?php if ( ! empty( $ministries ) ) : ?>
        <ul class="flex flex-col list-reset text-white">
          <?php foreach ( $ministries as $index => $data ) : ?>
            <?php if ( ! empty( $data['title'] && ! empty( $data['excerpt'] ) ) ) : ?>
              <li class="w-1/3 bg-cover bg-center" style="background-image: linear-gradient( rgba(<?php echo $data['color']; ?>, 0.83), rgba(<?php echo $data['color']; ?>, 0.83) ), url('<?php echo $data['bg']['url']; ?>');">
                <p>0<?php echo $index + 1; ?></p>
                <div>
                  <h2><?php echo $data['title']; ?></h2>
                  <p><?php echo $data['excerpt']; ?></p>
                  <p><a href="<?php echo site_url( '/category/' . $data['title'] ); ?>">View <?php echo $data['title']; ?></a></p>
                </div>
              </li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </section>
    <?php if ( ! empty( $the_board ) ) : ?>
      <section>
        <h2>Board Of Directors</h2>
        <ul class="list-reset flex flex-wrap">
          <?php foreach ( $the_board as $member ) : ?>
            <li class="w-1/2"><?php echo $member['board_member']; ?></li>
          <?php endforeach; ?>
        </ul>
      </section>
    <?php endif; ?>
    <?php if ( ! empty( $our_dream ) ) : ?>
      <section>
        <h2><?php echo $our_dream['title']; ?></h2>
        <div><?php echo $our_dream['description']; ?></div>
        <ul>
          <?php foreach ( $our_dream['stats'] as $i => $stat ) : ?>
            <li class="<?php echo 1 == $i ? 'stat--main' : ''; ?>">
              <p><?php echo $stat['stat_value']; ?></p>
              <p><?php echo $stat['stat_title']; ?></p>
            </li>
          <?php endforeach; ?> 
        </ul>
        <p><a href="<?php echo $our_dream['page_link']; ?>"><?php echo $our_dream['page_link_text']; ?></a></p>
      </section>
    <?php endif; ?>
  </div>
<?php endwhile; else: ?>
  <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>

<?php get_footer();