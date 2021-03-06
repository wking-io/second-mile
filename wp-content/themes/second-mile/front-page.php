<?php

get_header();

$pattern             = get_field('company_background_pattern', 'options');
$verse_text          = get_field('company_verse_text', 'options');
$verse_location      = get_field('company_verse_location', 'options');
$home_title          = get_field('home_title');
$home_has_video      = get_field('home_has_video');
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
    'bg'      => get_field('family_excerpt_image', 'options'),
    'color'   => '237, 62, 55',
  ),
);

?>

<section class="bg-pattern px-6 lg:px-8 pt-nav pb-8 relative">
  <div data-fade-in>
    <h1 class="hero__title font-display uppercase pt-jumbo leading-tight mb-4 lg:mb-8 lg:px-4 tracking-wide"><?php echo do_shortcode( $home_title ); ?></h1>
    <?php if ( ! empty( $verse_text ) && ! empty( $verse_location ) ) : ?>
      <aside class="hero__verse mb-8 lg:absolute lg:flex lg:items-center">
        <p class="hero__verse__text leading-normal mb-2 lg:font-bold lg:mb-0 lg:text-sm"><?php echo $verse_text; ?></p>
        <p class="font-bold lg:text-sm"><cite class="roman"><?php echo $verse_location; ?></cite></p>
      </aside>
    <?php endif; ?>
    <div class="hero__content flex flex-col<?php echo $home_has_video ? ' md:flex-row md:py-8 items-center' : ''; ?> mb-8 lg">
      <?php if ( $home_has_video ) : 
        $thumb = get_field('video_thumbnail'); ?>
        <div class="hero__video md:w-1/2 mb-8 md:mb-0 md:mr-8 rounded overflow-hidden flex-no-shrink">
          <button data-popup-action aria-controls="the-video">
            <img src="<?php echo $thumb['url']; ?>" alt="video thumbnail">
            <svg class="play-button" width="43" height="48" viewBox="0 0 43 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M41 20.5359C43.6667 22.0755 43.6667 25.9245 41 27.4641L6.5 47.3827C3.83333 48.9223 0.5 46.9978 0.5 43.9186V4.08141C0.5 1.00221 3.83333 -0.922287 6.5 0.617313L41 20.5359Z" fill="white"/>
            </svg>
          </button>
        </div>
      <?php elseif ( ! empty( $home_stats ) ) : ?>
        <ul class="list-reset flex justify-center lg:justify-between -mx-3 py-8 lg:mb-4">
          <?php foreach ( $home_stats as $i => $stat ) : ?>
            <li class="text-center lg:text-left flex-1 px-3">
              <p class="font-bold text-lg font-thin mb-1 lg:text-2xl" data-count-up><?php echo $stat['stat_value']; ?></p>
              <p class="font-bold text-xs lg:text-sm"><?php echo $stat['stat_title']; ?></p>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
      <?php if ( ! empty( $home_mission ) && ! empty( $home_vision ) ) : ?>
        <div class="flex flex-col<?php echo $home_has_video ? '' : ' md:flex-row md:-mx-4 pt-4'; ?>">
          <div class="mb-8 <?php echo $home_has_video ? '' : 'md:mb-0 md:mx-4'; ?>">
            <h2 class="text-base uppercase font-display mb-3 lg:text-md"><?php echo $home_mission['title']; ?></h2>
            <div class="font-serif leading-normal text-sm lg:text-body"><?php echo $home_mission['description']; ?></div>
          </div>
          <div class="<?php echo $home_has_video ? '' : 'md:mx-4'; ?>">
            <h2 class="text-base uppercase font-display mb-3 lg:text-md"><?php echo $home_vision['title']; ?></h2>
            <div class="font-serif leading-normal text-sm lg:text-body"><?php echo $home_vision['description']; ?></div>
          </div>
        </div>
      <?php endif; ?>
    </div>
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
      <div class="stack-box flex-no-shrink lg:mt-8">
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

      <div class="px-6 py-8 lg:ml-8 flex-1">
        <div class="w-64 py-8 lg:py-0 lg:mb-8 relative">
          <a href="<?php echo get_the_permalink( $home_parent_parties['post'] ); ?>"><?php echo secondmile_pp_logo( 'vertical' ); ?></a>
          <div class="parent-accent"></div>
        </div>
        <div class="xl:flex xl:flex-row-reverse parent-content">
          <?php if ( ! empty( $pp_stats ) ) : ?>
            <ul class="flex xl:flex-col lg:p-0 mb-8 -mx-6 xl:mx-0 lg:mb-0 parent-stats">
              <?php foreach ( $pp_stats as $stat ) : ?>
                <li class="px-6 parent-stats-item lg:mb-8 xl:text-right">
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
              <a class="button-outline button-outline--yellow" href="<?php echo get_the_permalink( $home_parent_parties['post'] ); ?>"><?php echo $home_parent_parties['link_text']; ?></a>
            </p>
          </div>
        </div>
      </div>

    <?php endif; ?>

  </div>
</section>

<?php if ( $home_has_video ) :
  $home_video = get_field('home_video'); ?>
  <aside id="the-video" data-popup data-popup-hidden="true">
    <div class="popup-bg" aria-controls="the-video" data-popup-action></div>
    <div class="video-content">
      <?php echo $home_video; ?>
    </div>
  </aside>
<?php endif; ?>

<?php get_footer();