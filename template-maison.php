<?php
/*
* Template Name: template-maison
*/
?>
<?php

$hero_subtitle = get_field('hero_subtitle');
$hero_text = get_field('hero_text');
$hero_description = get_field('hero_description');
$hero_button = get_field('hero_button');

$about_number = get_field('about_number');
$about_title = get_field('about_title');
$about_description = get_field('about_description');

$about_details = get_field('about_details');

$contact_heading_number = get_field('contact_heading_number');
$contact_heading_title = get_field('contact_heading_title');
$contact_title = get_field('contact_title');
$contact_title_surligne = get_field('contact_title_surligne');
$contact_text = get_field('contact_text');

$contact_label_name = get_field('contact_label_name');
$contact_error_name = get_field('contact_error_name');
$contact_label_email = get_field('contact_label_email');
$contact_error_email = get_field('contact_error_email');
$contact_label_message = get_field('contact_label_message');
$contact_error_text = get_field('contact_error_text');
$contact_button = get_field('contact_button');


?>


<?php get_header(); ?>


    <main class="page" itemprop="mainContentOfPage">
        <section class="hero">
            <h1 class="sro">
                Presentation Assia Rabhioui
            </h1>

            <p class="hero__subtitle">
                <?= esc_html($hero_subtitle); ?>
            </p>
            <p class="hero__text">
                <?= wp_kses_post($hero_text); ?>
            </p>

            <p class="hero__description">
                <?= esc_html($hero_description); ?>
            </p>

            <?php if (!empty($hero_button)) : ?>
                <a href="<?= esc_url($hero_button['url']); ?>" class="hero__button">
                    <?= esc_html($hero_button['title']); ?>
                </a>
            <?php endif; ?>
        </section>

        <section class="about" aria-labelledby="about-title">
            <div class="about__heading">
                <p class="about__number">
                    <?= esc_html($about_number); ?>
                </p>
                <h2 class="about__title" id="about_title">
                    <?= esc_html($about_title); ?>
                </h2>
            </div>
            <div class="about__content">
                <div class="about__explication">

                    <p class="about__description">
                        <?= esc_html($about_description); ?>
                    </p>
                </div>
                <?php if (!empty($about_details)) : ?>
                    <div class="about__details">
                        <?php foreach ($about_details as $about_detail) : ?>
                            <div class="about__row">
                                <p class="about__label">
                                    <?= esc_html($about_detail['about_label']); ?>
                                </p>
                                <p class="about__value">
                                    <?= esc_html($about_detail['about_value']); ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="contact" aria-labelledby="contact-title">
            <div class="contact__heading__group">
                <p class="contact__heading__number">
                    <?= esc_html($contact_heading_number); ?>
                </p>
                <h2 class="contact__heading__title" id="contact-title">
                    <?= esc_html($contact_heading_title); ?>
                </h2>
            </div>
            <div class="contact__content">
                <div class="contact__heading">
                    <p class="contact__title">
                        <?= wp_kses_post($contact_title); ?>
                    </p>

                    <p class="contact__text">
                        <?= esc_html($contact_text); ?>
                    </p>
                </div>
                <form action="<?= esc_url(admin_url('admin-post.php')); ?>" method="post" class="contact__form"
                      novalidate>
                    <input type="hidden" name="action" value="contact_form">
                    <div class="contact__field">
                        <label for="name" class="contact__label">
                            <?= esc_html($contact_label_name); ?>
                        </label>
                        <input id="name" name="name" type="text" class="contact__input" required>
                        <p class="contact__error"> <?= esc_html($contact_error_name); ?></p>
                    </div>

                    <div class="contact__field">
                        <label for="email" class="contact__label">
                            <?= esc_html($contact_label_email); ?>
                        </label>
                        <input id="email" name="email" type="email" class="contact__input" required
                               autocomplete="email">
                        <p class="contact__error"> <?= esc_html($contact_error_email); ?>Please enter a valid email
                            address.</p>
                    </div>

                    <div class="contact__field">
                        <label for="message" class="contact__label">
                            <?= esc_html($contact_label_message); ?>
                        </label>
                        <textarea id="message" name="message" class="contact__input contact__textarea" rows="6"
                                  required></textarea>
                        <p class="contact__error"> <?= esc_html($contact_error_text); ?>Please enter a valid email
                            address.</p>
                    </div>

                    <button type="submit" class="contact__button">
                        <?= esc_html($contact_button); ?>
                    </button>
                    <?php if (isset($_GET['contact']) && $_GET['contact'] === 'success') : ?>
                        <p>Votre message a été envoyé avec succès.</p>
                    <?php endif; ?>
                    <?php if (isset($_GET['contact']) && $_GET['contact'] === 'fail') : ?>
                        <p>
                            Erreur : le message n’a pas été envoyé.
                        </p>
                    <?php endif; ?>
                </form>
            </div>
        </section>
    </main>

<?php get_footer(); ?>