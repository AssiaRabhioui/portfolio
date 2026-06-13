<?php
// front-page.php

$intro_title = get_field('intro_title');
$intro_enter = get_field('intro_enter');

?>
<?php get_header(); ?>
<main class="intro intro__open"
      itemprop="mainContentOfPage">
    <button class="intro__trigger" type="button" aria-label="Ouvrir l’introduction">
        <span class="intro__brace intro__brace__left">{</span>
        <span class="intro__brace intro__brace__right">}</span>
    </button>

    <div class="intro__content">
        <h1 class="intro__title"
            itemprop="name">
            <?= esc_html($intro_title); ?>
        </h1>

        <?php if (!empty($intro_enter)) : ?>
            <a class="intro__enter"
               href="<?= esc_url($intro_enter['url']); ?>"
               target="<?= esc_attr($intro_enter['target'] ?: '_self'); ?>">
                <?= esc_html($intro_enter['title']); ?>
            </a>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
