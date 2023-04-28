<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/reclamation' => [[['_route' => 'app_reclamation_index', '_controller' => 'App\\Controller\\ReclamationController::index'], null, ['GET' => 0], null, true, false, null]],
        '/reclamation/back' => [[['_route' => 'app_reclamation_indexBack', '_controller' => 'App\\Controller\\ReclamationController::indexBack'], null, ['GET' => 0], null, false, false, null]],
        '/reclamation/new' => [[['_route' => 'app_reclamation_new', '_controller' => 'App\\Controller\\ReclamationController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/reponse' => [[['_route' => 'app_reponse_index', '_controller' => 'App\\Controller\\ReponseController::index'], null, ['GET' => 0], null, true, false, null]],
        '/reponse/new' => [[['_route' => 'app_reponse_new', '_controller' => 'App\\Controller\\ReponseController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/reset-password' => [[['_route' => 'app_forgot_password_request', '_controller' => 'App\\Controller\\ResetPasswordController::request'], null, null, null, false, false, null]],
        '/reset-password/check-email' => [[['_route' => 'app_check_email', '_controller' => 'App\\Controller\\ResetPasswordController::checkEmail'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/home' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\SecurityController::goHome'], null, null, null, false, false, null]],
        '/dashboard' => [[['_route' => 'app_dashboard', '_controller' => 'App\\Controller\\SecurityController::goDashboard'], null, null, null, false, false, null]],
        '/utilisateur' => [[['_route' => 'app_utilisateur_index', '_controller' => 'App\\Controller\\UtilisateurController::index'], null, ['GET' => 0], null, true, false, null]],
        '/utilisateur/newAdmin' => [[['_route' => 'app_utilisateur_newAdmin', '_controller' => 'App\\Controller\\UtilisateurController::newA'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/utilisateur/newFreelancer' => [[['_route' => 'app_utilisateur_newFreelancer', '_controller' => 'App\\Controller\\UtilisateurController::newF'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/utilisateur/newEntreprise' => [[['_route' => 'app_utilisateur_newEntreprise', '_controller' => 'App\\Controller\\UtilisateurController::newE'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/re(?'
                    .'|clamation/([^/]++)(?'
                        .'|(*:34)'
                        .'|/(?'
                            .'|ba(?'
                                .'|n(*:51)'
                                .'|ckshow(*:64)'
                            .')'
                            .'|edit(*:76)'
                        .')'
                        .'|(*:84)'
                    .')'
                    .'|ponse/([^/]++)(?'
                        .'|(*:109)'
                        .'|/edit(*:122)'
                        .'|(*:130)'
                    .')'
                    .'|set\\-password/reset(?:/([^/]++))?(*:172)'
                .')'
                .'|/utilisateur/(?'
                    .'|([^/]++)(*:205)'
                    .'|profile/([^/]++)(*:229)'
                    .'|([^/]++)(?'
                        .'|/edit(?'
                            .'|(*:256)'
                            .'|Profile(*:271)'
                        .')'
                        .'|(*:280)'
                    .')'
                    .'|verify(*:295)'
                .')'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:335)'
                    .'|wdt/([^/]++)(*:355)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:401)'
                            .'|router(*:415)'
                            .'|exception(?'
                                .'|(*:435)'
                                .'|\\.css(*:448)'
                            .')'
                        .')'
                        .'|(*:458)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        34 => [[['_route' => 'app_reclamation_show', '_controller' => 'App\\Controller\\ReclamationController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        51 => [[['_route' => 'app_reclamation_ban', '_controller' => 'App\\Controller\\ReclamationController::Ban'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        64 => [[['_route' => 'app_reclamation_showBack', '_controller' => 'App\\Controller\\ReclamationController::showBack'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        76 => [[['_route' => 'app_reclamation_edit', '_controller' => 'App\\Controller\\ReclamationController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        84 => [[['_route' => 'app_reclamation_delete', '_controller' => 'App\\Controller\\ReclamationController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        109 => [[['_route' => 'app_reponse_show', '_controller' => 'App\\Controller\\ReponseController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        122 => [[['_route' => 'app_reponse_edit', '_controller' => 'App\\Controller\\ReponseController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        130 => [[['_route' => 'app_reponse_delete', '_controller' => 'App\\Controller\\ReponseController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        172 => [[['_route' => 'app_reset_password', 'token' => null, '_controller' => 'App\\Controller\\ResetPasswordController::reset'], ['token'], null, null, false, true, null]],
        205 => [[['_route' => 'app_utilisateur_show', '_controller' => 'App\\Controller\\UtilisateurController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        229 => [[['_route' => 'app_utilisateur_showProfile', '_controller' => 'App\\Controller\\UtilisateurController::showFront'], ['id'], ['GET' => 0], null, false, true, null]],
        256 => [[['_route' => 'app_utilisateur_edit', '_controller' => 'App\\Controller\\UtilisateurController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        271 => [[['_route' => 'app_utilisateur_editProfile', '_controller' => 'App\\Controller\\UtilisateurController::editProfile'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        280 => [[['_route' => 'app_utilisateur_delete', '_controller' => 'App\\Controller\\UtilisateurController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        295 => [[['_route' => 'app_verify_email', '_controller' => 'App\\Controller\\UtilisateurController::verifyUserEmail'], [], null, null, false, false, null]],
        335 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        355 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        401 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        415 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        435 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        448 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        458 => [
            [['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
