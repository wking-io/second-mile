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

<section>
  <div>
    <h2><?php echo $donate_title; ?></h2>
    <aside>
      <p><?php echo $verse_text; ?></p>
      <p><cite class="roman"><?php echo $verse_location; ?></cite></p>
    </aside>
  </div>
  <div>
    <?php if ( ! empty( $donate_stats ) ) : ?>
      <ul class="flex list-reset">
        <?php foreach ( $donate_stats as $stat ) : ?>
          <li>
            <p><?php echo $stat['value']; ?></p>
            <p><?php echo $stat['title']; ?></p>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <div>
      <p><a href="<?php echo $donate_link_url; ?>"><?php echo $donate_link_text; ?></a></p>
      <p><a href="#ministries"><?php echo ! empty( $donate_more_text ) ? $donate_more_text : 'Choose A Specific Ministry'; ?></a></p>
    </div>
    <div><a href=""></a><a href=""></a></div>
  </div>
</section>
<section id="minstries">
  <h3>Our Ministries</h3>
  <?php if ( have_posts() ) : ?>
    <ul class="flex flex-wrap list-reset">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php
        $category = get_main_category( get_the_ID() );
        $color = secondmile_get_color( $category, 'rgb' );
      ?>
      <li class="w-1/3 bg-cover bg-center" style="background-image: linear-gradient( rgba(<?php echo $color; ?>, 0.83), rgba(<?php echo $color; ?>, 0.83) ), url('<?php echo $data['bg']['url']; ?>');">
        <p><strong><?php echo $category; ?></strong></p>
        <h2><?php the_title(); ?></h2>
        <p><a href="<?php the_permalink(); ?>">Donate Now</a></p>
      </li>
    <?php endwhile; ?>
    </ul>
  <?php else: ?>
    <p>Sorry, no posts matched your criteria.</p>
  <?php endif; ?>
</section>

<?php get_footer();
