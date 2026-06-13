<?php

$current_lang = function_exists('pll_current_language') ? pll_current_language() : 'fr';

$error_home = $current_lang === 'en'
        ? get_field('error_home_en', 'option')
        : get_field('error_home', 'option');

$error_texte = get_field('error_texte');
?>
<?php get_header(); ?>


<main class="error" itemprop="mainContentOfPage">
    <div class="error__background">
        <p class="error__number">404</p>
    </div>
    <?php if ($current_lang === 'en'): ?>
        <h1 class="error__texte">
            There is <em class="error__texte__em">nothing</em> here.
        </h1>
    <?php else: ?>
        <h1 class="error__texte">
            Il n'y a <em class="error__texte__em">rien</em> ici.
        </h1>
    <?php endif; ?>

    <?php if (!empty($error_home)) : ?>
        <a class="error__home"
           href="<?= esc_url($error_home['url']); ?>"
           target="<?= esc_attr($error_home['target'] ?: '_self'); ?>">
            <?= esc_html($error_home['title']); ?>
        </a>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
