<?php

return array(

    'name' => 'widget/slidesetlightbox',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',

    'config' => array(

        'name'  => 'slidesetlightbox',
        'label' => 'Slideset Lightbox',
        'core'  => true,
        'icon'  => 'plugins/widgets/slidesetlightbox/widget.svg',
        'view'  => 'plugins/widgets/slidesetlightbox/views/widget.php',
        'item'  => array('title', 'content', 'media'),
        'settings' => array(
            'nav'                => true,
            'slidenav'           => 'above',
            'slidenav_align'     => 'center',
            'slidenav_contrast'  => false,
            'filter'             => 'none',
            'filter_position'    => 'top',
            'filter_align'       => 'left',
            'filter_all'         => false,
            'animation'          => 'fade',
            'duration'           => '200',
            'autoplay'           => false,
            'interval'           => '3000',
            'autoplay_pause'     => true,
            'gutter'             => 'default',
            'columns'            => '1',
            'columns_small'      => 0,
            'columns_medium'     => 0,
            'columns_large'      => 0,
            'columns_xlarge'     => 0,
            'panel'              => 'blank',
            'panel_link'         => false,

            'media'              => true,
            'image_width'        => 'auto',
            'image_height'       => 'auto',
            'media_align'        => 'teaser',
            'media_border'       => 'none',
            'media_overlay'      => 'icon',
            'overlay_animation'  => 'fade',
            'media_animation'    => 'scale',
			
			'lightbox'    		 => 'lightbox',

            'title'              => true,
            'content'            => true,
            'social_buttons'     => true,
            'title_size'         => 'panel',
            'text_align'         => 'center',
            'link'               => true,
            'link_style'         => 'button',
            'link_text'          => 'Read more',
            'badge'              => true,
            'badge_style'        => 'badge',
            'badge_position'     => 'panel',

            'link_target'        => false,
            'class'              => ''
        )

    ),

    'events' => array(

        'init.site' => function($event, $app) {
            $app['scripts']->add('uikit-slideset', 'vendor/assets/uikit/js/components/slideset.min.js', array('uikit'));
        },

        'init.admin' => function($event, $app) {
            $app['angular']->addTemplate('slidesetlightbox.edit', 'plugins/widgets/slidesetlightbox/views/edit.php', true);
        }

    )

);
