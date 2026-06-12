<?php
/*
* Template Name: projet
*/
?>

<?php

$projet_headers = get_field('projet_headers');
$projet_title = get_field('projet_title');
$projet_title_surligne = get_field('projet_title_surligne');

$projet_shows = get_field('projet_shows');

?>

<?php get_header(); ?>
    <main class="projet" itemprop="mainContentOfPage">
        <header class="projet__top">
            <p class="projet__headers">
                <?= esc_html($projet_headers); ?>
            </p>
            <h1 class="projet__title">
                <?= esc_html($projet_title); ?>
                <span class="projet__title__surligne">
            <?= esc_html($projet_title_surligne); ?>
        </span>
            </h1>
        </header>
        <section class="projet__presention" aria-label="Liste des projets">
            <?php foreach ($projet_shows as $projet_show) : ?>
                <article class="projet__section"
                         itemscope
                         itemtype="https://schema.org/CreativeWork">

                    <a class="projet__show"
                       href="<?= esc_url(get_permalink($projet_show['projet_button_link']->ID)); ?>"
                       itemprop="url">
                        <div class="projet__image">
                            <?php if (!empty($projet_show['projet_image_show'])) : ?>
                                <img class="projet__image__show"
                                     itemprop="image"
                                     src="<?= esc_url($projet_show['projet_image_show']['url']); ?>"
                                     alt="<?= esc_attr($projet_show['projet_image_show']['alt']); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="projet__explication">
            <span class="projet__number">
                <?= esc_html($projet_show['projet_number']); ?>
            </span>
                            <h2 class="projet__name"
                                itemprop="name">
                                <?= esc_html($projet_show['projet_name']); ?>
                            </h2>
                            <p class="projet__description"
                               itemprop="description">
                                <?= esc_html($projet_show['projet_description']); ?>
                            </p>
                            <?php if (!empty($projet_show['projet_button_link'])) : ?>
                                <span class="projet__button projet__show__button">
                            Voir le projet
                        </span>
                            <?php endif; ?>
                        </div>
                    </a>
                </article>
            <?php endforeach; ?>
        </section>
    </main>

<?php get_footer(); ?>