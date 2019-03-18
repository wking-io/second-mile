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

<section class="bg-pattern">

  <h1><?php echo do_shortcode( $home_title ); ?></h1>
  <?php if ( ! empty( $verse_text ) && ! empty( $verse_location ) ) : ?>
    <aside>
      <p><?php echo $verse_text; ?></p>
      <p><cite class="roman"><?php echo $verse_location; ?></cite></p>
    </aside>
  <?php endif; ?>
  <div class="hero__content flex flex-col<?php echo $home_has_video ? ' md:flex-row' : ''; ?>">
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
      <ul>
        <?php foreach ( $home_stats as $i => $stat ) : ?>
          <li>
            <p><?php echo $stat['stat_value']; ?></p>
            <p><?php echo $stat['stat_title']; ?></p>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <?php if ( ! empty( $home_mission ) && ! empty( $home_vision ) ) : ?>
      <div class="flex flex-col">
        <div>
          <h2><?php echo $home_mission['title']; ?></h2>
          <p><?php echo $home_mission['description']; ?></p>
        </div>
        <div>
          <h2><?php echo $home_vision['title']; ?></h2>
          <p><?php echo $home_vision['description']; ?></p>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>
<?php if ( ! empty( $home_ministries ) ) : ?>
  <section>
    <ul class="flex list-reset text-white">
      <?php foreach ( $home_ministries as $index => $data ) : ?>
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
  </section>
<?php endif; ?>
<section>
  <div class="container flex flex-col md:flex-row">
    <?php if ( ! empty( $home_who_we_are ) ) : ?>
      <div class="stack-box">
        <h3><?php echo $home_who_we_are['title']; ?></h3>
        <p><?php echo $home_who_we_are['description']; ?></p>
        <p>
          <a href="<?php echo site_url('/who-we-are'); ?>"><?php $home_who_we_are['link_text']; ?></a>
        </p>
      </div>
    <?php endif; ?>
    <?php if ( ! empty( $home_parent_parties ) ) : ?>
      <?php 
        $pp_stats   = get_field( 'home_page_stats', $home_parent_parties['post'] );
        $pp_content = secondmile_get_content_by_id( $home_parent_parties['post'] );
      ?>

      <div>
        <div>
          <?php echo secondmile_pp_logo( 'horizontal' ); ?>
        </div>
        <div>
          <div>
            <div>
              <?php echo $pp_content; ?>
            </div>
            <p>
              <a href="<?php echo get_the_permalink( $home_parent_parties['post'] ); ?>)"><?php echo $home_parent_parties['link_text']; ?></a>
            </p>
          </div>
          <?php if ( ! empty( $pp_stats ) ) : ?>
            <ul>
              <?php foreach ( $pp_stats as $stat ) : ?>
                <li>
                  <p><?php echo $stat['stat_value']; ?></p>
                  <p><?php echo $stat['stat_title']; ?></p>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </div>
      </div>

    <?php endif; ?>

  </div>
</section>

<?php get_footer();