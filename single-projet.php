<?php

$single_projet_back = get_field('single_projet_back');
$single_projet_title = get_field('single_projet_title');
$single_projet_description = get_field('single_projet_description');

$single_projet_details = get_field('single_projet_details');

$single_projet_show_title = get_field('single_projet_show_title');
$single_projet_show_image = get_field('single_projet_show_image');

$single_projet_explications = get_field('single_projet_explications');


?>
<?php get_header(); ?>

    <main class="single__projet" itemprop="mainContentOfPage">
        <a class="single__projet__back" href="<?= esc_url(home_url('/projets/')); ?>">
            <?= esc_html($single_projet_back) ?>
        </a>
        <h1 class="single__projet__title">
            <?= wp_kses_post($single_projet_title); ?>
        </h1>
        <p class="single__projet__description">
            <?= esc_html($single_projet_description); ?>
        </p>
        <div class="single__projet__details">
            <?php foreach ($single_projet_details as $single_projet_detail) : ?>
                <div class="single__projet__row">
                    <p class="single__projet__label">
                        <?= esc_html($single_projet_detail['single_projet_label']); ?>
                    </p>
                    <p class="single__projet__value">
                        <?= esc_html($single_projet_detail['single_projet_value']); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
        <section class="single__projet__show">
            <h2 class="single__projet__show__title">
                <?= esc_html($single_projet_show_title); ?>
            </h2>
            <?php if (!empty($single_projet_show_image)) : ?>
                <div class="single__projet__show__image__container">
                    <img class="single__projet__show__image"
                         src="<?= esc_url($single_projet_show_image['url']); ?>"
                         alt="<?= esc_attr($single_projet_show_image['alt']); ?>">
                </div>
            <?php endif; ?>
            <article class="single__projet__explication">
                <?php foreach ($single_projet_explications as $single_projet_explication) : ?>
                    <div class="single__projet__explication__card">
                        <h3 class="single__projet__explication__title">
                            <?= esc_html($single_projet_explication['single_projet_explication_title']); ?>
                        </h3>
                        <div class="single__projet__explication__content <?= !empty($single_projet_explication['single_projet_explication_reverse']) ? 'single__projet__explication__content__reverse' : ''; ?>">
                            <?php if (!empty($single_projet_explication['single_projet_explication_image'])) : ?>
                                <div class="single__projet__explication__media">
                                    <img class="single__projet__explication__image"
                                         src="<?= esc_url($single_projet_explication['single_projet_explication_image']['url']); ?>"
                                         alt="<?= esc_attr($single_projet_explication['single_projet_explication_image']['alt']); ?>">
                                </div>
                            <?php endif; ?>
                            <div class="single__projet__explication__text">
                                <?= wp_kses_post($single_projet_explication['single_projet_explication_text']); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </article>
        </section>


    </main>


<?php get_footer(); ?>