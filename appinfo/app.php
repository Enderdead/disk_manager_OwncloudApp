<?php
namespace OCA\diskM\AppInfo;


\OC::$server->getNavigationManager()->add(function () {
    $urlGenerator = \OC::$server->getURLGenerator();
    return [
        // The string under which your app will be referenced in owncloud
        'id' => 'diskM',
        // The sorting weight for the navigation.
        // The higher the number, the higher will it be listed in the navigation
        'order' => 10,

        // The icon that will be shown in the navigation, located in img/
        'icon' => $urlGenerator->imagePath('disk_manager', 'diskM.svg'),

        // The application's title, used in the navigation & the settings page of your app
        'name' => \OC::$server->getL10N('diskM')->t('Gesture disk switch on'),
    ];
});


use OCA\diskM\Hooks;
$app = new Application();
$app->getContainer()->query(Hooks::class)->register();
//\OCP\Util::connectHook('OC_User', 'pre_deleteUser', 'OCA\MyApp\Hooks\User', 'preLogin');

?>


