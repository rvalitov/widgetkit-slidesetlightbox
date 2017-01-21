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

// JS Options
$options = array();
$options[] = ($settings['animation'] != 'fade') ? 'animation: \'' . $settings['animation'] . '\'' : '';
$options[] = ($settings['duration'] != '200') ? 'duration: ' . $settings['duration']: '';
$options[] = ($settings['autoplay']) ? 'autoplay: true ' : '';
$options[] = ($settings['interval'] != '3000') ? 'autoplayInterval: ' . $settings['interval'] : '';
$options[] = ($settings['autoplay_pause']) ? '' : 'pauseOnHover: false';
$options[] = ($settings['columns']) ? 'default: ' . $settings['columns']: '';
$options[] = ($settings['columns_small']) ? 'small: ' . $settings['columns_small']: '';
$options[] = ($settings['columns_medium']) ? 'medium: ' . $settings['columns_medium']: '';
$options[] = ($settings['columns_large']) ? 'large: ' . $settings['columns_large']: '';
$options[] = ($settings['columns_xlarge']) ? 'xlarge: ' . $settings['columns_xlarge']: '';

// Grid
$grid  = '{wk}-grid {wk}-grid-match {wk}-flex-center {wk}-grid-width-1-'.$settings['columns'];
$grid .= $settings['columns_small'] ? ' {wk}-grid-width-small-1-'.$settings['columns_small'] : '';
$grid .= $settings['columns_medium'] ? ' {wk}-grid-width-medium-1-'.$settings['columns_medium'] : '';
$grid .= $settings['columns_large'] ? ' {wk}-grid-width-large-1-'.$settings['columns_large'] : '';
$grid .= $settings['columns_xlarge'] ? ' {wk}-grid-width-xlarge-1-'.$settings['columns_xlarge'] : '';

$grid .= in_array($settings['gutter'], array('collapse','large','medium','small')) ? ' {wk}-grid-'.$settings['gutter'] : '' ;
$grid = str_replace('{wk}',$cssprefix,$grid);

// Panel
$panel = '{wk}-panel';
switch ($settings['panel']) {
    case 'box' :
        $panel .= ' {wk}-panel-box';
        break;
    case 'primary' :
        $panel .= ' {wk}-panel-box {wk}-panel-box-primary';
        break;
    case 'secondary' :
        $panel .= ' {wk}-panel-box {wk}-panel-box-secondary';
        break;
    case 'hover' :
        $panel .= ' {wk}-panel-hover';
        break;
    case 'header' :
        $panel .= ' {wk}-panel-header';
        break;
    case 'space' :
        $panel .= ' {wk}-panel-space';
        break;
}
$panel = str_replace('{wk}',$cssprefix,$panel);

// Title Size
switch ($settings['title_size']) {
    case 'panel':
        $title_size = '{wk}-panel-title';
        break;
    case 'large':
        $title_size = '{wk}-heading-large {wk}-margin-top-remove';
        break;
    default:
        $title_size = '{wk}-' . $settings['title_size'] . ' {wk}-margin-top-remove';
}
$title_size = str_replace('{wk}',$cssprefix,$title_size);

// Link Style
switch ($settings['link_style']) {
    case 'button':
        $link_style = '{wk}-button';
        break;
    case 'primary':
        $link_style = '{wk}-button {wk}-button-primary';
        break;
    case 'button-large':
        $link_style = '{wk}-button {wk}-button-large';
        break;
    case 'primary-large':
        $link_style = '{wk}-button {wk}-button-large {wk}-button-primary';
        break;
    case 'button-link':
        $link_style = '{wk}-button {wk}-button-link';
        break;
    default:
        $link_style = '';
}
$link_style = str_replace('{wk}',$cssprefix,$link_style);

// Badge Style
switch ($settings['badge_style']) {
    case 'badge':
        $badge_style = '{wk}-badge';
        break;
    case 'success':
        $badge_style = '{wk}-badge {wk}-badge-success';
        break;
    case 'warning':
        $badge_style = '{wk}-badge {wk}-badge-warning';
        break;
    case 'danger':
        $badge_style = '{wk}-badge {wk}-badge-danger';
        break;
    case 'text-muted':
        $badge_style  = '{wk}-text-muted';
        $badge_style .= ($settings['badge_position'] == 'panel') ? ' {wk}-panel-badge' : '';
        break;
    case 'text-primary':
        $badge_style  = '{wk}-text-primary';
        $badge_style .= ($settings['badge_position'] == 'panel') ? ' {wk}-panel-badge' : '';
        break;
}
$badge_style = str_replace('{wk}',$cssprefix,$badge_style);

// Media Border
$border = ($settings['media_border'] != 'none') ? '{wk}-border-' . $settings['media_border'] : '';
$border = str_replace('{wk}',$cssprefix,$border);

// Link Target
$link_target = ($settings['link_target']) ? ' target="_blank"' : '';

// Filter Tags
$tags = array();
if (isset($settings['filter_tags']) && is_array($settings['filter_tags'])) {
    $tags = $settings['filter_tags'];
}

if(!count($tags)){
	foreach ($items as $i => $item) {
		if ($item['tags']) {
			$tags = array_merge($tags, $item['tags']);
		}
	}
	$tags = array_unique($tags);

	natsort($tags);
	$tags = array_values($tags);
}

// JS Options
$options[] = (count($tags) && $settings['filter'] != 'none' && !$settings['filter_all']) ? 'filter: \'' . $tags[0] . '\'': '';
$options   = '{'.implode(',', array_filter($options)).'}';

// Custom Class
$class = $settings['class'] ? ' class="' . $settings['class'] . '"' : '';

?>

<div<?php echo $class; ?> data-<?php echo $cssprefix?>-slideset="<?php echo $options; ?>">

    <?php if ($tags && $settings['filter'] != 'none' && $settings['filter_position'] == 'top') : ?>
    <?php echo $this->render('plugins/widgets/' . $widget->getConfig('name')  . '/views/_filter.php', compact('items', 'settings', 'tags')); ?>
    <?php endif; ?>

    <div class="<?php echo $cssprefix?>-slidenav-position <?php echo $cssprefix?>-margin">

        <ul class="<?php echo $cssprefix?>-slideset <?php echo $grid; ?>">
		<?php 
		if ($settings['lightbox']=='lightbox')
			//Creating unique $groupcode variable to be used as a lightbox group id.
			$groupcode=uniqid('wk-slideset-lightbox');
		?>
        <?php foreach ($items as $item) :

                // Social Buttons
                $socials = '';
                if ($settings['social_buttons']) {
                    $socials .= $item['twitter'] ? '<div><a class="{wk}-icon-button {wk}-icon-twitter" href="'. $item->escape('twitter') .'"></a></div>': '';
                    $socials .= $item['facebook'] ? '<div><a class="{wk}-icon-button {wk}-icon-facebook" href="'. $item->escape('facebook') .'"></a></div>': '';
                    $socials .= $item['google-plus'] ? '<div><a class="{wk}-icon-button {wk}-icon-google-plus" href="'. $item->escape('google-plus') .'"></a></div>': '';
                    $socials .= $item['email'] ? '<div><a class="{wk}-icon-button {wk}-icon-envelope-o" href="mailto:'. $item->escape('email') .'"></a></div>': '';
                }
				$socials = str_replace('{wk}',$cssprefix,$socials);

                // Second Image as Overlay
                $media2 = '';
                if ($settings['media_overlay'] == 'image') {
                    foreach ($item as $field) {
                        if ($field != 'media' && $item->type($field) == 'image') {
                            $media2 = $field;
                            break;
                        }
                    }
                }

                // Media Type
                $attrs  = array('class' => '');
                $width  = $item['media.width'];
                $height = $item['media.height'];

                if ($item->type('media') == 'image') {
                    $attrs['alt'] = strip_tags($item['title']);

                    $attrs['class'] .= ($border) ? $border : '';
                    $attrs['class'] .= ($settings['media_animation'] != 'none' && !$media2) ? ' {wk}-overlay-' . $settings['media_animation'] : '';

                    $width  = ($settings['image_width'] != 'auto') ? $settings['image_width'] : '';
                    $height = ($settings['image_height'] != 'auto') ? $settings['image_height'] : '';
                }

                if ($item->type('media') == 'video') {
                    $attrs['class'] = '{wk}-responsive-width';
                    $attrs['controls'] = true;
                }

                if ($item->type('media') == 'iframe') {
                    $attrs['class'] = '{wk}-responsive-width';
                }

                $attrs['width']  = ($width) ? $width : '';
                $attrs['height'] = ($height) ? $height : '';
				$attrs['class'] = str_replace('{wk}',$cssprefix,$attrs['class']);

                if (($item->type('media') == 'image') && ($settings['image_width'] != 'auto' || $settings['image_height'] != 'auto')) {
                    $media = $item->thumbnail('media', $width, $height, $attrs);
                } else {
                    $media = $item->media('media', $attrs);
                }

                // Second Image as Overlay
                if ($media2) {

                    $attrs['class'] .= ' {wk}-overlay-panel {wk}-overlay-image';
                    $attrs['class'] .= ($settings['media_animation'] != 'none') ? ' {wk}-overlay-' . $settings['media_animation'] : '';
					$attrs['class'] = str_replace('{wk}',$cssprefix,$attrs['class']);

                    $media2 = $item->thumbnail($media2, $width, $height, $attrs);
                }

                // Link and Overlay
                $overlay       = '';
                $overlay_hover = '';
                $panel_hover   = '';

                if ($item['link']) {

                    if ($settings['panel_link']) {

                        $panel_hover .= ($settings['panel'] == 'box') ? ' {wk}-panel-box-hover' : '';
                        $panel_hover .= ($settings['panel'] == 'primary') ? ' {wk}-panel-box-primary-hover' : '';
                        $panel_hover .= ($settings['panel'] == 'secondary') ? ' {wk}-panel-box-secondary-hover' : '';

                        if (($settings['media_overlay'] == 'icon') ||
                            ($media2) ||
                            ($socials && $settings['media_overlay'] == 'social-buttons') ||
                            ($item['media'] && $settings['media'] && $settings['media_animation'] != 'none')) {
                            $panel_hover .= ' {wk}-overlay-hover';
                        }

                    } elseif ($settings['media_overlay'] == 'link' || $settings['media_overlay'] == 'icon' || $settings['media_overlay'] == 'image') {
						if ($settings['lightbox']=='lightbox'){
							//Nothing here
						}
						else
							$overlay = '<a class="{wk}-position-cover" href="' . $item->escape('link') . '"' . $link_target . '></a>';
                        $overlay_hover = ' {wk}-overlay-hover';
                    }

                    if ($settings['media_overlay'] == 'icon') {
                        $overlay = '<div class="{wk}-overlay-panel {wk}-overlay-background {wk}-overlay-icon {wk}-overlay-' . $settings['overlay_animation'] . '"></div>' . $overlay;
                    }
					$panel_hover = str_replace('{wk}',$cssprefix,$panel_hover);

                    if ($media2) {
                        $overlay = $media2 . $overlay;
                    }

                }

                if ($socials && $settings['media_overlay'] == 'social-buttons') {

                    $overlay  = '<div class="{wk}-overlay-panel {wk}-overlay-background {wk}-overlay-' . $settings['overlay_animation'] . ' {wk}-flex {wk}-flex-center {wk}-flex-middle {wk}-text-center"><div>';
                    $overlay .= '<div class="{wk}-grid {wk}-grid-small" data-{wk}-grid-margin>' . $socials . '</div>';
                    $overlay .= '</div></div>';

                    $overlay_hover = !$settings['panel_link'] ? ' {wk}-overlay-hover' : '';
                }
				
                if ($overlay || ($settings['panel_link'] && $settings['media_animation'] != 'none')) {
                    $media  = '<div class="{wk}-overlay' . $overlay_hover . ' ' . $border . '">' . $media . $overlay . '</div>';
                }
				$media = str_replace('{wk}',$cssprefix,$media);

                // Filter
                $filter = '';
                if ($item['tags'] && $settings['filter'] != 'none') {
                    $filter = ' data-{wk}-filter="' . implode(',', $item['tags']) . '"';
					$filter = str_replace('{wk}',$cssprefix,$filter);
                }

                // Panel Title last
                if ($settings['title_size'] == 'panel' &&
                    !($item['media'] && $settings['media'] && $settings['media_align'] == 'bottom') &&
                    !($item['content'] && $settings['content']) &&
                    !($socials && ($settings['media_overlay'] != 'social-buttons')) &&
                    !($item['link'] && $settings['link'])) {
                        $title_size .= ' {wk}-margin-bottom-remove';
                }
				$title_size = str_replace('{wk}',$cssprefix,$title_size);

            ?>

            <li<?php echo $filter; ?>>

                <div class="<?php echo $panel; ?><?php echo $panel_hover; ?> <?php echo $cssprefix?>-text-<?php echo $settings['text_align']; ?>">

					<?php if ($settings['lightbox']=='lightbox') : ?>
					<a class="<?php echo $cssprefix?>-position-cover <?php echo $cssprefix?>-position-z-index" title="<?php echo htmlspecialchars($item['title']);?>" data-lightbox-type="image" data-<?php echo $cssprefix?>-lightbox="{group:'<?php echo $groupcode;?>'}" href="<?php echo $item->get('media'); ?>"<?php echo $link_target; ?>></a>
					<?php elseif ($item['link'] && $settings['panel_link']) : ?>
                    <a class="<?php echo $cssprefix?>-position-cover <?php echo $cssprefix?>-position-z-index" href="<?php echo $item->escape('link'); ?>"<?php echo $link_target; ?>></a>
                    <?php endif; ?>

                    <?php if ($item['badge'] && $settings['badge'] && $settings['badge_position'] == 'panel') : ?>
                    <div class="<?php echo $cssprefix?>-panel-badge <?php echo $badge_style; ?>"><?php echo $item['badge']; ?></div>
                    <?php endif; ?>

                    <?php if ($item['media'] && $settings['media'] && in_array($settings['media_align'], array('teaser', 'top'))) : ?>
                    <div class="<?php echo $cssprefix?>-text-center <?php echo (($settings['media_align'] == 'teaser') ? $cssprefix.'-panel-teaser' : $cssprefix.'-margin '.$cssprefix.'-margin-top-remove'); ?>"><?php echo $media; ?></div>
                    <?php endif; ?>

                    <?php if ($item['title'] && $settings['title']) : ?>
                    <h3 class="<?php echo $title_size; ?>">

                        <?php if ($item['link']) : ?>
                            <a class="<?php echo $cssprefix?>-link-reset" href="<?php echo $item->escape('link'); ?>"<?php echo $link_target; ?>><?php echo $item['title']; ?></a>
                        <?php else : ?>
                            <?php echo $item['title']; ?>
                        <?php endif; ?>

                        <?php if ($item['badge'] && $settings['badge'] && $settings['badge_position'] == 'title') : ?>
                        <span class="<?php echo $cssprefix?>-margin-small-left <?php echo $badge_style; ?>"><?php echo $item['badge']; ?></span>
                        <?php endif; ?>

                    </h3>
                    <?php endif; ?>

                    <?php if ($item['media'] && $settings['media'] && $settings['media_align'] == 'bottom') : ?>
                    <div class="<?php echo $cssprefix?>-margin <?php echo $cssprefix?>-text-center"><?php echo $media; ?></div>
                    <?php endif; ?>

                    <?php if ($item['content'] && $settings['content']) : ?>
                    <div class="<?php echo $cssprefix?>-margin"><?php echo $item['content']; ?></div>
                    <?php endif; ?>

                    <?php if ($socials && ($settings['media_overlay'] != 'social-buttons')) : ?>
                    <div class="<?php echo $cssprefix?>-grid <?php echo $cssprefix?>-grid-small <?php echo $cssprefix?>-flex-<?php echo $settings['text_align']; ?>" data-<?php echo $cssprefix?>-grid-margin><?php echo $socials; ?></div>
                    <?php endif; ?>

                    <?php if ($item['link'] && $settings['link']) : ?>
                    <p><a<?php if($link_style) echo ' class="' . $link_style . '"'; ?> href="<?php echo $item->escape('link'); ?>"<?php echo $link_target; ?>><?php echo $app['translator']->trans($settings['link_text']); ?></a></p>
                    <?php endif; ?>

                </div>

            </li>

        <?php endforeach; ?>
        </ul>

        <?php if ($settings['slidenav'] == 'above') : ?>
        <a href="#" class="<?php echo $cssprefix?>-slidenav <?php if ($settings['slidenav_contrast']) echo $cssprefix.'-slidenav-contrast'; ?> <?php echo $cssprefix?>-slidenav-previous <?php echo $cssprefix?>-hidden-touch" data-<?php echo $cssprefix?>-slideset-item="previous"></a>
        <a href="#" class="<?php echo $cssprefix?>-slidenav <?php if ($settings['slidenav_contrast']) echo $cssprefix.'-slidenav-contrast'; ?> <?php echo $cssprefix?>-slidenav-next <?php echo $cssprefix?>-hidden-touch" data-<?php echo $cssprefix?>-slideset-item="next"></a>
        <?php endif ?>

    </div>

    <?php if ($settings['slidenav'] == 'bottom') : ?>
    <div class="<?php echo $cssprefix?>-flex <?php echo $cssprefix?>-flex-<?php echo $settings['slidenav_align']; ?> <?php echo $cssprefix?>-margin-top">
        <div class="<?php echo $cssprefix?>-grid <?php echo $cssprefix?>-grid-small">
            <div><a href="#" class="<?php echo $cssprefix?>-slidenav <?php echo $cssprefix?>-slidenav-previous" data-<?php echo $cssprefix?>-slideset-item="previous"></a></div>
            <div><a href="#" class="<?php echo $cssprefix?>-slidenav <?php echo $cssprefix?>-slidenav-next" data-<?php echo $cssprefix?>-slideset-item="next"></a></div>
        </div>
    </div>
    <?php endif ?>

    <?php if ($settings['nav']) : ?>
    <ul class="<?php echo $cssprefix?>-slideset-nav <?php echo $cssprefix?>-dotnav <?php echo $cssprefix?>-flex-center <?php echo $cssprefix?>-margin-bottom-remove"></ul>
    <?php endif ?>

    <?php if ($tags && $settings['filter'] != 'none' && $settings['filter_position'] == 'bottom') : ?>
    <?php echo $this->render('plugins/widgets/' . $widget->getConfig('name')  . '/views/_filter.php', compact('items', 'settings', 'tags')); ?>
    <?php endif; ?>

</div>
