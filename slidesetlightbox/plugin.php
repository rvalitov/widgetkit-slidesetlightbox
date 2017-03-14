<?php
/*
SlidesetEx plugin for Widgetkit 2.
Author: Ramil Valitov
E-mail: ramilvalitov@gmail.com
Web: http://www.valitov.me/
Git: https://github.com/rvalitov/widgetkit-slidesetlightbox
*/

require_once(__DIR__.'/views/WidgetkitExPlugin.php');
use WidgetkitEx\SlidesetEx\WidgetkitExPlugin;

return array(

    'name' => 'widget/slidesetlightbox',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',
	
	'plugin_version' => 'v1.2.1',
	
	'plugin_date' => '14/03/2017',
	
	'plugin_logo' => 'https://raw.githubusercontent.com/wiki/rvalitov/widgetkit-slidesetlightbox/images/logo.png',
	
	'plugin_wiki' => 'https://github.com/rvalitov/widgetkit-slidesetlightbox/wiki',

    'config' => array(

        'name'  => 'slidesetlightbox',
        'label' => 'SlidesetEx',
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
			'filter_tags'        => array(),
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
			$uikit=(WidgetkitExPlugin::getCSSPrefix($app)=='uk') ? 'uikit' : 'uikit2';
            $app['scripts']->add($uikit.'-slideset', 'vendor/assets/uikit/js/components/slideset.min.js', array($uikit));
        },

        'init.admin' => function($event, $app) {
            $plugin=new WidgetkitExPlugin($app);
			$uikit=(WidgetkitExPlugin::getCSSPrefix($app)=='uk') ? 'uikit' : 'uikit2';
			//Backend CSS
			$app['styles']->add('slideset_ex_edit', 'plugins/widgets/slidesetlightbox/css/slidesetex.edit.css', array('widgetkit-application'));
			//Adding our own translations:
			$app['translator']->addResource('plugins/widgets/slidesetlightbox/languages/'.$app['locale'].'.json');
			//Edit template:
            $app['angular']->addTemplate('slidesetlightbox.edit', 'plugins/widgets/slidesetlightbox/views/edit.php', true);
			//Adding tooltip:
			$app['scripts']->add($uikit.'-tooltip', 'vendor/assets/uikit/js/components/tooltip.min.js', array($uikit));
			$app['styles']->add($uikit.'-tooltip', 'https://cdnjs.cloudflare.com/ajax/libs/uikit/'.$plugin->getUIkitVersion().'/css/components/tooltip.min.css', array($uikit));
			//jQuery wait plugin:
			$app['scripts']->add('jquery.wait', 'plugins/widgets/slidesetlightbox/assets/jquery.wait.min.js', array($uikit));
			//Marked:
			$app['scripts']->add('marked', 'plugins/widgets/slidesetlightbox/assets/marked.min.js', array($uikit));
			//Mailchimp for subscription:
			$app['scripts']->add('mailchimp', 'plugins/widgets/slidesetlightbox/assets/jquery.formchimp.min.js', array($uikit));
			//jQuery form validator http://www.formvalidator.net/:
			$app['scripts']->add('jquery-form-validator', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.20/jquery.form-validator.min.js', array($uikit));
			//Underscore.js
			$app['scripts']->add('underscore', 'plugins/widgets/slidesetlightbox/assets/underscore-min.js', array($uikit));
			//Semantic version compare
			$app['scripts']->add('versioncompare', 'plugins/widgets/slidesetlightbox/assets/versioncompare.min.js', array($uikit));
			//Marked:
			$app['scripts']->add('replacer', 'plugins/widgets/slidesetlightbox/assets/replacer.min.js', array($uikit));
			//Generating dynamic update script:
			$app['scripts']->add('slidesetlightbox.dynamic-updater', $plugin->generateUpdaterJS($app), array(), 'string');
        },
		
		'request' => function($event, $app) {
			$global=null;
			if ( (isset($app['request'])) && (isset($app['request']->request)) ) {
				$content=$app['request']->request->get('content');
				if (isset($content['data']['_widget']['data']['global']))
					$global=$content['data']['_widget']['data']['global'];
			}
				
			if ($global){
				//Global is set for valid requests like "Save" and "Save & Close"
				$plugin=new WidgetkitExPlugin($app);
				$plugin->saveGlobalSettings($global);
			}
		}

    )

);
