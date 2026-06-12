<?php

$footer = dw_get_navigation_links('footer');

$current_lang = function_exists('pll_current_language') ? pll_current_language() : 'fr';

$footer_name = $current_lang === 'en'
        ? get_field('footer_name_en', 'option')
        : get_field('footer_name', 'option');

$footer_profession = $current_lang === 'en'
        ? get_field('footer_profession_en', 'option')
        : get_field('footer_profession', 'option');

$footer_socials = $current_lang === 'en'
        ? get_field('footer_socials_en', 'option')
        : get_field('footer_socials', 'option');

$footer_copyright = $current_lang === 'en'
        ? get_field('footer_copyright_en', 'option')
        : get_field('footer_copyright', 'option');
?>


<footer class="footer">
    <div class="footer__infos">
        <div class="footer__presentation">
            <h2 class="footer__name">
                <?= esc_html($footer_name)?>
            </h2>
            <p class="footer__profession">
                <?= esc_html($footer_profession)?>
            </p>
        </div>
        <nav class="footer__nav">
            <ul class="footer__nav__list" role="list">
                <?php foreach ($footer as $link) : ?>
                    <li class="footer__nav__list__item">
                        <a class="footer__nav__list__item__link"
                           href="<?= esc_url($link->href); ?>"><?= esc_html($link->label); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
    <div class="footer__legal">
        <?php if (!empty($footer_socials)) : ?>
            <a class="footer__socials"
               href="<?= esc_url($footer_socials['url']); ?>"
               target="<?= esc_attr($footer_socials['target']); ?>">
                <?= esc_html($footer_socials['title']); ?>
            </a>
        <?php endif; ?>
        <p class="footer__copyright">
            <?= esc_html($footer_copyright)?>
        </p>

    </div>
</footer>
</body>
</html>

