<?php

include('core/theme/configuration.php');

register_nav_menu('header', 'Le menu qui se trouve dans le header');
register_nav_menu('footer', 'Le menu qui se trouve dans le footer');

function dw_get_navigation_links(string $menu_name): array
{
    // Récupérer l'objet WP pour le menu à la location $location
    $all_menus = get_nav_menu_locations();

    if (!isset($all_menus[$menu_name])) {
        return [];
    }

    // Je récupère l'id de mon menu
    $nav_id = $all_menus[$menu_name];

    $items_menu = wp_get_nav_menu_items($nav_id);
    $links = [];

    foreach ($items_menu as $item) {
        $link = new stdClass();
        $link->href = $item->url;
        $link->label = $item->title;
        $link->title = $item->attr_title;

        $links[] = $link;
    }

    return $links;
}

function dw_asset(string $filename): string
{
    $manifest_path = get_theme_file_path('public/.vite/manifest.json');

    if (file_exists($manifest_path)) {
        $manifest = json_decode(file_get_contents($manifest_path), true);

        if (isset($manifest['wp-content/themes/portfolio/assets/css/styles.scss']) && $filename === 'css') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/assets/css/styles.scss']['file']);
        }

        if (isset($manifest['wp-content/themes/portfolio/assets/js/main.js']) && $filename === 'js') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/assets/js/main.js']['file']);
        }
    }

    return '';
}

//charger les traductions existantes
load_theme_textdomain('hepl-trad', get_template_directory() . '/locales');

// Fonction pour les chaînes de traduction personnalisées
function __hepl(string $translation): ?string
{
    return __($translation, 'hepl-trad');
}

// recevoir les mails

add_action('admin_post_nopriv_contact_form', 'handle_contact_form');
add_action('admin_post_contact_form', 'handle_contact_form');

function handle_contact_form(): void
{
    $name = sanitize_text_field($_POST['name'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');

    if (!$name || !$email || !$message) {
        wp_redirect(add_query_arg('contact', 'error', wp_get_referer()));
        exit;
    }

    $to = 'rabhiouiassia@gmail.com';
    $subject = 'Nouveau message depuis le portfolio';
    $body = "Nom : $name\nEmail : $email\n\nMessage :\n$message";

    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $name . ' <' . $email . '>',
    ];

    wp_mail($to, $subject, $body, $headers);

    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        wp_redirect(add_query_arg('contact', 'success', wp_get_referer()));
    } else {
        wp_redirect(add_query_arg('contact', 'fail', wp_get_referer()));
    }
    exit;
}


//page un projet


add_action('init', 'plai_register_post_types');

function plai_register_post_types(): void
{

    register_post_type('projet', [
        'labels' => [
            'name' => 'Projet',
            'singular_name' => 'Projet',
            'add_new_item' => 'Ajouter un projet',
            'edit_item' => 'Modifier un projet',
        ],
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'supports' => ['title'],
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'fiche-projet'],
    ]);
}






