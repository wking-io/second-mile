<?php

get_header();

$pattern             = get_field('company_background_pattern', 'options');
$verse_text          = get_field('company_verse_text', 'options');
$verse_location      = get_field('company_verse_location', 'options');
$home_title          = get_field('home_title');
$home_has_video      = get_field('home_has_video');
$home_video          = get_field('home_video');
$home_stats          = get_field('home_stats');
$home_mission        = get_field('mission');
$home_vision         = get_field('vision');
$home_who_we_are     = get_field('who_we_are_teaser');
$home_parent_parties = get_field('parent_parties');
$home_ministries     = array(
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

<section class="bg-pattern pl-6 pr-6 pt-nav pb-8">

  <h1 class="hero__title text-display uppercase pt-jumbo leading-tight mb-4"><?php echo do_shortcode( $home_title ); ?></h1>
  <?php if ( ! empty( $verse_text ) && ! empty( $verse_location ) ) : ?>
    <aside class="mb-8">
      <p class="leading-normal mb-2"><?php echo $verse_text; ?></p>
      <p class="font-bold"><cite class="roman"><?php echo $verse_location; ?></cite></p>
    </aside>
  <?php endif; ?>
  <div class="hero__content flex flex-col<?php echo $home_has_video ? ' md:flex-row' : ''; ?> mb-8">
    <?php if ( $home_has_video ) : ?>
      <div class="hero__video">
        <?php 
          echo cl_video_tag( $tb_purpose_video, 
            array(
              "loop" => true,
              "autoplay" => true,
              "muted" => true,
              "preload" => true,
              "fallback_content" => "Your browser does not support HTML5 video tags",
              "width" => 500,
              "crop" => "fit",
            )
          ); 
        ?>
      </div>
    <?php elseif ( ! empty( $home_stats ) ) : ?>
      <ul class="list-reset flex justify-center -mx-3 py-8">
        <?php foreach ( $home_stats as $i => $stat ) : ?>
          <li class="text-center flex-1 px-3">
            <p class="font-bold text-lg font-thin mb-1"><?php echo $stat['stat_value']; ?></p>
            <p class="font-bold text-xs"><?php echo $stat['stat_title']; ?></p>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <?php if ( ! empty( $home_mission ) && ! empty( $home_vision ) ) : ?>
      <div class="flex flex-col pt-4">
        <div class="mb-8">
          <h2 class="text-base uppercase text-display mb-3"><?php echo $home_mission['title']; ?></h2>
          <div class="font-serif leading-normal text-sm"><?php echo $home_mission['description']; ?></div>
        </div>
        <div>
          <h2 class="text-base uppercase text-display mb-3"><?php echo $home_vision['title']; ?></h2>
          <div class="font-serif leading-normal text-sm"><?php echo $home_vision['description']; ?></div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>
<?php if ( ! empty( $home_ministries ) ) : ?>
  <section>
    <ul class="flex flex-col md:flex-row list-reset text-white">
      <?php foreach ( $home_ministries as $index => $data ) : ?>
        <?php if ( ! empty( $data['title'] && ! empty( $data['excerpt'] ) ) ) : ?>
          <li class="w-full md:w-1/3 bg-cover bg-center relative p-8 overflow-hidden" style="background-image: linear-gradient( rgba(<?php echo $data['color']; ?>, 0.83), rgba(<?php echo $data['color']; ?>, 0.83) ), url('<?php echo $data['bg']['url']; ?>');">
            <p class="font-display leading-none absolute pin-t pin-l -mt-1 -ml-6 opacity-25 ministry-count">0<?php echo $index + 1; ?></p>
            <div>
              <h2 class="uppercase font-display font-md mb-3"><?php echo $data['title']; ?></h2>
              <div class="leading-normal mb-6"><?php echo $data['excerpt']; ?></div>
              <p><a class="font-bold uppercase text-white hover:no-underline" href="<?php echo site_url( '/category/' . $data['title'] ); ?>">View <?php echo $data['title']; ?> Ministries</a></p>
            </div>
          </li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  </section>
<?php endif; ?>
<section>
  <div class="flex flex-col items-start md:flex-row py-8 md:py-jumbo">
    <?php if ( ! empty( $home_who_we_are ) ) : ?>
      <div class="stack-box my-8 md:my-0">
        <div class="stack-box__content">
          <h3 class="uppercase text-2xl font-display mb-4"><?php echo $home_who_we_are['title']; ?></h3>
          <div class="font-serif text-sm leading-normal mb-8"><?php echo $home_who_we_are['description']; ?></div>
          <p>
            <a class="button-light" href="<?php echo site_url('/who-we-are'); ?>"><?php echo $home_who_we_are['link_text']; ?></a>
          </p>
        </div>
      </div>
    <?php endif; ?>
    <?php if ( ! empty( $home_parent_parties ) ) : ?>
      <?php 
        $pp_stats   = get_field( 'home_page_stats', $home_parent_parties['post'] );
        $pp_excerpt = get_field( 'home_page_description', $home_parent_parties['post'] );
      ?>

      <div class="px-6 py-8">
        <div class="w-64">
          <?php echo secondmile_pp_logo( 'vertical' ); ?>
        </div>
        <div>
          <?php if ( ! empty( $pp_stats ) ) : ?>
            <ul class="list-reset">
              <?php foreach ( $pp_stats as $stat ) : ?>
                <li>
                  <p><?php echo $stat['value']; ?></p>
                  <p><?php echo $stat['title']; ?></p>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
          <div>
            <div>
              <?php echo $pp_excerpt; ?>
            </div>
            <p>
              <a href="<?php echo get_the_permalink( $home_parent_parties['post'] ); ?>)"><?php echo $home_parent_parties['link_text']; ?></a>
            </p>
          </div>
        </div>
      </div>

    <?php endif; ?>

  </div>
</section>

<?php get_footer();