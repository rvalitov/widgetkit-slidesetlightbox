<?php
/*
SliderEx plugin for Widgetkit 2.
Author: Ramil Valitov
Contacts: ramilvalitov@gmail.com
Web: http://www.valitov.me/
Git: https://github.com/rvalitov/widgetkit-slidesetlightbox
*/

require_once(__DIR__.'/WidgetkitExPlugin.php');
use WidgetkitEx\SlidesetEx\WidgetkitExPlugin;

$cssprefix=WidgetkitExPlugin::getCSSPrefix($app);

// Filter Nav
$tabs_center = '';
if ($settings['filter'] == 'tabs') {

    $filter = ($settings['filter_position'] != 'top') ? '{wk}-tab {wk}-tab-'. $settings['filter_position'] : '{wk}-tab';
    $filter .= ($settings['filter_align'] == 'right') ? ' {wk}-tab-flip' : '';
    $filter .= ($settings['filter_align'] != 'center') ? ' {wk}-margin {wk}-margin-bottom-remove' : '';

    // Center
    $tabs_center = '';
    if ($settings['filter_align'] == 'center') {
        $tabs_center = '{wk}-tab-center {wk}-margin {wk}-margin-bottom-remove';
        if ($settings['filter_position'] == 'bottom') {
            $tabs_center .= ' {wk}-tab-center-bottom';
        }
    }

} elseif ($settings['filter'] != 'none') {

    switch ($settings['filter']) {
        case 'text':
            $filter = '{wk}-subnav';
            break;
        case 'lines':
            $filter = '{wk}-subnav {wk}-subnav-line';
            break;
        case 'nav':
            $filter = '{wk}-subnav {wk}-subnav-pill';
            break;
    }

    $filter .= ' {wk}-flex-' . $settings['filter_align'];
}
$filter = str_replace('{wk}',$cssprefix,$filter);
$tabs_center = str_replace('{wk}',$cssprefix,$tabs_center);
?>

<?php if ($tabs_center) : ?>
<div class="<?php echo $tabs_center; ?>">
<?php endif ?>

<ul class="<?php echo $filter; ?>"<?php if ($settings['filter'] == 'tabs') echo ' data-'.$cssprefix.'-tab'?>>

    <?php if ($settings['filter_all']) : ?>
    <li class="<?php echo $cssprefix?>-active" data-<?php echo $cssprefix?>-filter=""><a href="#"><?php echo $app['translator']->trans('All'); ?></a></li>
    <?php endif ?>

    <?php foreach ($tags as $i => $tag) : ?>
    <li data-<?php echo $cssprefix?>-filter="<?php echo $tag; ?>"><a href="#"><?php echo ucwords($tag); ?></a></li>
    <?php endforeach; ?>

</ul>

<?php if ($tabs_center) : ?>
</div>
<?php endif ?>