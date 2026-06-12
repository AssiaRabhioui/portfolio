<?php

$header = dw_get_navigation_links('header');


?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Assia Rabhioui">
    <meta name="description" content="portfolio de Assia Rabhioui">
    <meta name="keyword" content="portfolio, Assia Rabhioui, Web designer, ui designer, ux designer">
    <meta name="google-site-verification" content="kIpigkWoBxRyx90vwJoie37yUyDf-b51jko6dkvwrQk"/>
    <title><?= get_the_title() ?></title>
    <link rel="stylesheet" type="text/css" href="<?= dw_asset('css'); ?>">
    <link rel=" stylesheet" type="text/scss" href="<?= dw_asset('css'); ?>">
    <script src="<?= dw_asset('js') ?>" defer></script>
</head>

<body itemscope itemtype="https://schema.org/WebPage">
<div class="sparkle-layer" aria-hidden="true"></div>
<header class="header"
        itemprop="author"
        itemscope itemtype="https://schema.org/Person">
    <h1 class="header__name" itemprop="name">
        Assia Rabhioui
    </h1>
    <div class="header__right">
        <nav class="header__nav">
            <ul class="header__nav__list" role="list">
                <?php foreach ($header as $link) : ?>
                    <li class="header__nav__list__item">
                        <a class="header__nav__list__item__link"
                           href="<?= esc_url($link->href); ?>"><?= esc_html($link->label); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <?php if (function_exists('pll_the_languages')) : ?>
            <?php $languages = pll_the_languages(['raw' => 1]); ?>
            <?php foreach ($languages as $lang) : ?>
                <a
                        href="<?= esc_url($lang['url']); ?>"
                        class="header__language__choice <?= $lang['current_lang'] ? 'header__language__choice--active' : ''; ?>"
                >
                    <?= esc_html(strtoupper($lang['slug'])); ?>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</header>
