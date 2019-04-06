<?php

get_header();

$company_address = get_field('company_address', 'options');
$company_number  = get_field('company_phone_number', 'options');

?>

<section class="mt-nav min-h-screen bg-black text-white lg:relative">
  <div class="aspect-5:3 lg:aspect-none lg:absolute lg:pin"><?php echo do_shortcode( '[huge_it_maps id="1"]' ); ?></div>
  <div class="contact-content p-6 lg:py-6 lg:px-0 bg-black lg:relative lg:max-w-6xl">
    <div class="lg:w-3/4 lg:mx-auto">
      <h2 class="font-display uppercase text-2xl lg:text-4xl tracking-wide -ml-8 lg:-ml-jumbo lg:-ml-8 pt-8 pb-6">Contact Us</h2>
      <address class="mb-8">
        <p class="roman text-sm mb-4 flex items-center">
          <svg class="mr-3" width="auto" height="15px" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6 0.5C3.0975 0.5 0.75 2.8475 0.75 5.75C0.75 9.6875 6 15.5 6 15.5C6 15.5 11.25 9.6875 11.25 5.75C11.25 2.8475 8.9025 0.5 6 0.5ZM6 7.625C4.965 7.625 4.125 6.785 4.125 5.75C4.125 4.715 4.965 3.875 6 3.875C7.035 3.875 7.875 4.715 7.875 5.75C7.875 6.785 7.035 7.625 6 7.625Z" fill="#16A9A9"/>
          </svg>
          <span class="leading-normal"><?php echo $company_address; ?></span>
        </p>
        <p class="roman text-sm flex items-center">
          <svg class="mr-3" width="auto" height="15px" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.0075 9.535C12.085 9.535 11.1925 9.385 10.36 9.115C10.0975 9.025 9.805 9.0925 9.6025 9.295L8.425 10.7725C6.3025 9.76 4.315 7.8475 3.2575 5.65L4.72 4.405C4.9225 4.195 4.9825 3.9025 4.9 3.64C4.6225 2.8075 4.48 1.915 4.48 0.9925C4.48 0.5875 4.1425 0.25 3.7375 0.25H1.1425C0.7375 0.25 0.25 0.43 0.25 0.9925C0.25 7.96 6.0475 13.75 13.0075 13.75C13.54 13.75 13.75 13.2775 13.75 12.865V10.2775C13.75 9.8725 13.4125 9.535 13.0075 9.535Z" fill="#16A9A9"/>
          </svg>
          <span class="phone"><?php echo $company_number; ?></span>
        </p>
      </address>
      <?php gravity_form( 1, false, false, false, '', false ); ?>
    </div>
  </div>
</section>
<?php get_footer();