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

<section class="bg-pattern px-6 lg:px-8 pt-nav pb-8 relative">

  <h1 class="hero__title text-display uppercase pt-jumbo leading-tight mb-4 lg:mb-8 lg:px-4"><?php echo do_shortcode( $home_title ); ?></h1>
  <?php if ( ! empty( $verse_text ) && ! empty( $verse_location ) ) : ?>
    <aside class="hero__verse mb-8 lg:absolute lg:flex lg:items-center">
      <p class="hero__verse__text leading-normal mb-2 lg:font-bold lg:mb-0 lg:text-sm"><?php echo $verse_text; ?></p>
      <p class="font-bold lg:text-sm"><cite class="roman"><?php echo $verse_location; ?></cite></p>
    </aside>
  <?php endif; ?>
  <div class="hero__content flex flex-col<?php echo $home_has_video ? ' md:flex-row' : ''; ?> mb-8 lg">
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
      <ul class="list-reset flex justify-center lg:justify-between -mx-3 py-8 lg:mb-4">
        <?php foreach ( $home_stats as $i => $stat ) : ?>
          <li class="text-center lg:text-left flex-1 px-3">
            <p class="font-bold text-lg font-thin mb-1 lg:text-2xl"><?php echo $stat['stat_value']; ?></p>
            <p class="font-bold text-xs lg:text-sm"><?php echo $stat['stat_title']; ?></p>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <?php if ( ! empty( $home_mission ) && ! empty( $home_vision ) ) : ?>
      <div class="flex flex-col md:flex-row md:-mx-4 pt-4">
        <div class="mb-8 md:mb-0 md:mx-4">
          <h2 class="text-base uppercase text-display mb-3 lg:text-md"><?php echo $home_mission['title']; ?></h2>
          <div class="font-serif leading-normal text-sm lg:text-base"><?php echo $home_mission['description']; ?></div>
        </div>
        <div class="md:mx-4">
          <h2 class="text-base uppercase text-display mb-3 lg:text-md"><?php echo $home_vision['title']; ?></h2>
          <div class="font-serif leading-normal text-sm lg:text-base"><?php echo $home_vision['description']; ?></div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>
<?php if ( ! empty( $home_ministries ) ) : ?>
  <section>
    <ul class="flex flex-col lg:flex-row list-reset text-white">
      <?php foreach ( $home_ministries as $index => $data ) : ?>
        <?php if ( ! empty( $data['title'] && ! empty( $data['excerpt'] ) ) ) : ?>
          <li class="w-full lg:w-1/3 lg:h-jumbo lg:flex lg:items-end bg-cover bg-center relative p-8 overflow-hidden" style="background-image: linear-gradient( rgba(<?php echo $data['color']; ?>, 0.83), rgba(<?php echo $data['color']; ?>, 0.83) ), url('<?php echo $data['bg']['url']; ?>');">
            <p class="font-display leading-none absolute pin-t pin-l -mt-1 -ml-6 lg:-ml-8 opacity-25 ministry-count">0<?php echo $index + 1; ?></p>
            <div>
              <h2 class="uppercase font-display text-md mb-3 lg:mb-8"><?php echo $data['title']; ?></h2>
              <div class="leading-normal mb-6 md:text-md lg:text-lg lg:mb-jumbo"><?php echo $data['excerpt']; ?></div>
              <p class="lg:mb-8"><a class="font-bold text-xs md:text-sm uppercase text-white hover:no-underline button-outline button-outline--white-<?php echo $data['title']; ?>" href="<?php echo site_url( '/category/' . $data['title'] ); ?>">View <?php echo $data['title']; ?> Ministries</a></p>
            </div>
          </li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  </section>
<?php endif; ?>
<section>
  <div class="flex flex-col items-start lg:flex-row py-8 mt-6 lg:w-9/10 lg:mx-auto">
    <?php if ( ! empty( $home_who_we_are ) ) : ?>
      <div class="stack-box flex-no-shrink">
        <div class="stack-box__content sm:flex sm:items-end lg:block">
          <h3 class="stack-box__title uppercase text-2xl font-display mb-4 sm:mb-0 sm:mr-6 lg:mb-4 lg:mr-0"><?php echo $home_who_we_are['title']; ?></h3>
          <div class="font-serif text-sm leading-normal mb-0">
            <?php echo $home_who_we_are['description']; ?>
            <p class="pt-8">
              <a class="button-light" href="<?php echo site_url('/who-we-are'); ?>"><?php echo $home_who_we_are['link_text']; ?></a>
            </p>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <?php if ( ! empty( $home_parent_parties ) ) : ?>
      <?php 
        $pp_stats   = get_field( 'home_page_stats', $home_parent_parties['post'] );
        $pp_excerpt = get_field( 'home_page_description', $home_parent_parties['post'] );
      ?>

      <div class="px-6 py-8 lg:ml-8 lg:pt-0 flex-1">
        <div class="w-64 py-8 lg:pt-0 lg:mb-8 xl:py-0 relative">
          <?php echo secondmile_pp_logo( 'vertical' ); ?>
          <div class="parent-accent"></div>
        </div>
        <div class="xl:flex xl:flex-row-reverse parent-content">
          <?php if ( ! empty( $pp_stats ) ) : ?>
            <ul class="flex xl:flex-col mb-8 -mx-6 lg:mx-0 lg:mb-0 parent-stats">
              <?php foreach ( $pp_stats as $stat ) : ?>
                <li class="px-6 parent-stats-item lg:mb-8 lg:text-right">
                  <p class="font-bold text-xl font-thin mb-1"><?php echo $stat['value']; ?></p>
                  <p class="font-bold text-sm"><?php echo $stat['title']; ?></p>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
          <div>
            <div class="parent-excerpt leading-normal font-serif text-sm mb-8">
              <?php echo $pp_excerpt; ?>
            </div>
            <p>
              <a class="button-outline button-outline--yellow" href="<?php echo get_the_permalink( $home_parent_parties['post'] ); ?>)"><?php echo $home_parent_parties['link_text']; ?></a>
            </p>
          </div>
        </div>
      </div>

    <?php endif; ?>

  </div>
</section>

<?php get_footer();