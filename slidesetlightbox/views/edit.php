<?php
/*
SliderEx plugin for Widgetkit 2.
Author: Ramil Valitov
Contacts: ramilvalitov@gmail.com
Web: http://www.valitov.me/
Git: https://github.com/rvalitov/widgetkit-slidesetlightbox
*/

use WidgetkitEx\SlidesetEx\WidgetkitExPlugin;
$plugin=new WidgetkitExPlugin($app);

?>

<div class="uk-grid uk-grid-divider uk-form uk-form-horizontal uk-slidesetex" data-uk-grid-margin>
    <div class="uk-width-medium-1-4">

        <div class="wk-panel-marginless">
            <ul class="uk-nav uk-nav-side" data-uk-switcher="{connect:'#nav-content'}">
                <li><a href="">{{'Slideset' | trans}}</a></li>
                <li><a href="">{{'Media' | trans}}</a></li>
                <li><a href="">{{'Content' | trans}}</a></li>
                <li><a href="">{{'General' | trans}}</a></li>
				<li><a href="#">{{'About' | trans}}</a></li>
            </ul>
        </div>

    </div>
    <div class="uk-width-medium-3-4">

        <ul id="nav-content" class="uk-switcher">
            <li>

                <h3 class="wk-form-heading">{{'Navigation' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Dotnav' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Enables/disables the dotted navigation control.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['nav']"> {{'Show Dotnav' | trans}}</label>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-slidenav">{{'Slidenav' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Enables/disables the slide navigation control (left and right arrows).' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-slidenav" class="uk-form-width-medium" ng-model="widget.data['slidenav']">
                            <option value="none">{{'None' | trans}}</option>
                            <option value="above">{{'Above' | trans}}</option>
                            <option value="bottom">{{'Bottom' | trans}}</option>
                        </select>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.slidenav == 'bottom'">
                            <label>
                                <select class="uk-form-width-small" ng-model="widget.data['slidenav_align']">
                                    <option value="left">{{'Left' | trans}}</option>
                                    <option value="center">{{'Center' | trans}}</option>
                                    <option value="right">{{'Right' | trans}}</option>
                                </select>
                                {{'Alignment' | trans}}
                            </label>
                        </p>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.slidenav == 'above'">
                            <label><input type="checkbox" ng-model="widget.data['slidenav_contrast']"> {{'Invert slidenav color' | trans}}</label>
                        </p>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-filter">{{'Filter' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Slideset items can be filtered by tag. This option allows to choose the filtering navigation control. You should assign a tag for each item in order to make this feature work.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-filter" class="uk-form-width-medium" ng-model="widget.data['filter']">
                            <option value="none">{{'None' | trans}}</option>
                            <option value="text">{{'Text' | trans}}</option>
                            <option value="lines">{{'Divider' | trans}}</option>
                            <option value="nav">{{'Nav' | trans}}</option>
                            <option value="tabs">{{'Tabs' | trans}}</option>
                        </select>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.filter != 'none'">
                            <label>
                                <select class="uk-form-width-small" ng-model="widget.data['filter_position']">
                                    <option value="top">{{'Top' | trans}}</option>
                                    <option value="bottom">{{'Bottom' | trans}}</option>
                                </select>
                                {{'Position' | trans}}
                            </label>
                        </p>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.filter != 'none'">
                            <label>
                                <input class="uk-form-width-1-1" type="text" ng-model="widget.data['filter_tags']" ng-list placeholder= "{{ 'tag, tag, ...' | trans }}"> {{ 'Show only selected tags (Optional)' | trans }}
                            </label>
                        </p>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.filter != 'none'">
                            <label>
                                <select class="uk-form-width-small" ng-model="widget.data['filter_align']">
                                    <option value="left">{{'Left' | trans}}</option>
                                    <option value="center">{{'Center' | trans}}</option>
                                    <option value="right">{{'Right' | trans}}</option>
                                </select>
                                {{'Alignment' | trans}}
                            </label>
                        </p>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.filter != 'none'">
                            <label><input type="checkbox" ng-model="widget.data['filter_all']"> {{'Show filter for all items' | trans}}</label>
                        </p>
                    </div>
                </div>

                <h3 class="wk-form-heading">{{'Animations' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-animation">{{'Animation' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Select the animation that is used for displaying the slideset items.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-animation" class="uk-form-width-medium" ng-model="widget.data['animation']">
                            <option value="fade">{{'Fade' | trans}}</option>
                            <option value="scale">{{'Scale' | trans}}</option>
                            <option value="slide-horizontal">{{'Slide Horizontal' | trans}}</option>
                            <option value="slide-vertical">{{'Slide Vertical' | trans}}</option>
                            <option value="slide-top">{{'Slide Top' | trans}}</option>
                            <option value="slide-bottom">{{'Slide Bottom' | trans}}</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-duration">{{'Duration (ms)' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Duration of the animation.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <input id="wk-duration" class="uk-form-width-medium" type="text" ng-model="widget.data['duration']">
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Autoplay' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'The autoplay feature automatically switches the slideset items.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['autoplay']"> {{'Enable autoplay' | trans}}</label>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.autoplay">
                            <label><input class="uk-form-width-small" type="text" ng-model="widget.data['interval']"> Interval (ms)</label>
                        </p>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.autoplay">
                            <label><input type="checkbox" ng-model="widget.data['autoplay_pause']"> {{'Pause autoplay when hovering the slideset' | trans}}</label>
                        </p>
                    </div>
                </div>

                <h3 class="wk-form-heading">{{'Columns' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-gutter">{{'Gutter' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Defines the spacing that is set between items.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-gutter" class="uk-form-width-medium" ng-model="widget.data['gutter']">
                            <option value="default">{{'Default' | trans}}</option>
                            <option value="collapse">{{'Collapse' | trans}}</option>
                            <option value="small">{{'Small' | trans}}</option>
                            <option value="medium">{{'Medium' | trans}}</option>
							<option value="large">{{'Large' | trans}}</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-columns">{{'Phone Portrait' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Number of columns on phones in portrait view.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-columns" class="uk-form-width-medium" ng-model="widget.data['columns']">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-columns-small">{{'Phone Landscape' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Number of columns on phones in landscape view.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-columns-small" class="uk-form-width-medium" ng-model="widget.data['columns_small']">
                            <option value="0">{{'Inherit' | trans}}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-columns-medium">{{'Tablet' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Number of columns on tablets.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-columns-medium" class="uk-form-width-medium" ng-model="widget.data['columns_medium']">
                            <option value="0">{{'Inherit' | trans}}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-columns-large">{{'Desktop' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Number of columns on desktops.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-columns-large" class="uk-form-width-medium" ng-model="widget.data['columns_large']">
                            <option value="0">{{'Inherit' | trans}}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-columns-xlarge">{{'Large Screens' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Number of columns on large screens.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-columns-xlarge" class="uk-form-width-medium" ng-model="widget.data['columns_xlarge']">
                            <option value="0">{{'Inherit' | trans}}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                </div>

                <h3 class="wk-form-heading">{{'Items' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-panel">{{'Panel' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'The panel wraps the slideset items. You can choose a panel styling here.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-panel" class="uk-form-width-medium" ng-model="widget.data['panel']">
                            <option value="blank">{{'Blank' | trans}}</option>
                            <option value="box">{{'Box' | trans}}</option>
                            <option value="primary">{{'Box Primary' | trans}}</option>
                            <option value="secondary">{{'Box Secondary' | trans}}</option>
                            <option value="hover">{{'Hover' | trans}}</option>
                            <option value="header">{{'Header' | trans}}</option>
                            <option value="space">{{'Space' | trans}}</option>
                        </select>
                        <p class="uk-form-controls-condensed">
                            <span><input type="checkbox" ng-model="widget.data['panel_link']"> {{'Link entire panel, if link exists' | trans}}</span>
                        </p>
                    </div>
                </div>

            </li>
            <li>

                <h3 class="wk-form-heading">{{'Media' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Display' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Display the image.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['media']"> {{'Show media' | trans}}</label>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Image' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Set the width and height of the image in pixels. Use \'auto\' for auto size.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <label><input class="uk-form-width-small" type="text" ng-model="widget.data['image_width']"> {{'Width (px)' | trans}}</label>
                        <p class="uk-form-controls-condensed">
                            <label><input class="uk-form-width-small" type="text" ng-model="widget.data['image_height']"> {{'Height (px)' | trans}}</label>
                        </p>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-media-align">{{'Alignment' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Define the image alignment regarding to the content.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-media-align" class="uk-form-width-medium" ng-model="widget.data['media_align']">
                            <option value="teaser">{{'Teaser' | trans}}</option>
                            <option value="top">{{'Above Title' | trans}}</option>
                            <option value="bottom">{{'Below Title' | trans}}</option>
                            <option value="last">{{'Last' | trans}}</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
					<span class="uk-form-label" for="wk-media-border">{{'Border' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Defines the style of the image\'s border.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-media-border" class="uk-form-width-medium" ng-model="widget.data['media_border']">
                            <option value="none">{{'None' | trans}}</option>
                            <option value="circle">{{'Circle' | trans}}</option>
                            <option value="rounded">{{'Rounded' | trans}}</option>
                        </select>
                    </div>
                </div>
				
				<div class="uk-form-row">
                    <span class="uk-form-label" for="wk-media-lightbox">{{'Lightbox Type' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Enables/disables the lightbox mode.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-media-lightbox" class="uk-form-width-medium" ng-model="widget.data['lightbox']">
                            <option value="none">{{'None' | trans}}</option>
                            <option value="lightbox">{{'Lightbox' | trans}}</option>
                        </select>
                    </div>
                </div>

                <h3 class="wk-form-heading">{{'Overlay' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-media-overlay">{{'Overlay' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Define what will be displayed inside the overlay or hide the overlay.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-media-overlay" class="uk-form-width-medium" ng-model="widget.data['media_overlay']">
                            <option value="none">{{'None' | trans}}</option>
                            <option value="link">{{'Link' | trans}}</option>
                            <option value="icon">{{'Icon' | trans}}</option>
                            <option value="image">{{'Image' | trans}} ({{'If second one exists' | trans}})</option>
                            <option value="social-buttons">{{'Social Buttons' | trans}} ({{'If enabled' | trans}})</option>
                        </select>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.media_overlay == 'icon' || widget.data.media_overlay == 'social-buttons'">
                            <label>
                                <select class="uk-form-width-small" ng-model="widget.data['overlay_animation']">
                                    <option value="fade">{{'Fade' | trans}}</option>
                                    <option value="slide-top">{{'Slide Top' | trans}}</option>
                                    <option value="slide-bottom">{{'Slide Bottom' | trans}}</option>
                                    <option value="slide-left">{{'Slide Left' | trans}}</option>
                                    <option value="slide-right">{{'Slide Right' | trans}}</option>
                                </select>
                                {{'Animation' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'The animation that will be applied to the overlay when being displayed on hover.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span>
                            </label>
                        </p>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-thumbnail-animation">{{'Image Animation' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'The animation that will be applied to the image on hover.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-thumbnail-animation" class="uk-form-width-medium" ng-model="widget.data['media_animation']">
                            <option value="none">{{'None' | trans}}</option>
                            <option value="fade">{{'Fade' | trans}}</option>
                            <option value="scale">{{'Scale' | trans}}</option>
                            <option value="spin">{{'Spin' | trans}}</option>
                            <option value="grayscale">{{'Grayscale' | trans}}</option>
                        </select>
                    </div>
                </div>

            </li>
            <li>

                <h3 class="wk-form-heading">{{'Text' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Display' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Show or hide title, content and social buttons.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <p class="uk-form-controls-condensed">
                            <label><input type="checkbox" ng-model="widget.data['title']"> {{'Show title' | trans}}</label>
                        </p>
                        <p class="uk-form-controls-condensed">
                            <label><input type="checkbox" ng-model="widget.data['content']"> {{'Show content' | trans}}</label>
                        </p>
                        <p class="uk-form-controls-condensed">
                            <label><input type="checkbox" ng-model="widget.data['social_buttons']"> {{'Show social buttons' | trans}}</label>
                        </p>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-title-size">{{'Title Size' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Define the font size of the title.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-title-size" class="uk-form-width-medium" ng-model="widget.data['title_size']">
                            <option value="panel">{{'Default' | trans}}</option>
                            <option value="h1">H1</option>
                            <option value="h2">H2</option>
                            <option value="h3">H3</option>
                            <option value="h4">H4</option>
							<option value="h5">H5</option>
							<option value="h6">H6</option>
                            <option value="large">{{'Extra Large' | trans}}</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-text-align">{{'Alignment' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Define the text alignment.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-text-align" class="uk-form-width-medium" ng-model="widget.data['text_align']">
                            <option value="left">{{'Left' | trans}}</option>
                            <option value="right">{{'Right' | trans}}</option>
                            <option value="center">{{'Center' | trans}}</option>
                        </select>
                    </div>
                </div>

                <h3 class="wk-form-heading">{{'Link' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Display' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Display the Read More link. The link URL is added to each item in the Content Manager.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['link']"> {{'Show link' | trans}}</label>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-link-style">{{'Style' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Set the style of the Read More link.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-link-style" class="uk-form-width-medium" ng-model="widget.data['link_style']">
                            <option value="text">{{'Text' | trans}}</option>
                            <option value="button">{{'Button' | trans}}</option>
                            <option value="primary">{{'Button Primary' | trans}}</option>
                            <option value="button-large">{{'Button Large' | trans}}</option>
                            <option value="primary-large">{{'Button Large Primary' | trans}}</option>
                            <option value="button-link">{{'Button Link' | trans}}</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-link-text">{{'Text' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Define the link text.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <input id="wk-link-text" class="uk-form-width-medium" type="text" ng-model="widget.data['link_text']">
                    </div>
                </div>

                <h3 class="wk-form-heading">{{'Badge' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Display' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Show or hide the badge which is displayed over the content.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['badge']"> {{'Show badge' | trans}}</label>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-badge-style">{{'Style' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Defines the style of the badge.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-badge-style" class="uk-form-width-medium" ng-model="widget.data['badge_style']">
                            <option value="badge">{{'Default' | trans}}</option>
                            <option value="success">{{'Success' | trans}}</option>
                            <option value="warning">{{'Warning' | trans}}</option>
                            <option value="danger">{{'Danger' | trans}}</option>
                            <option value="text-muted">{{'Text Muted' | trans}}</option>
                            <option value="text-primary">{{'Text Primary' | trans}}</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-badge-position">{{'Position' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" style="margin-top: 5px;" title="{{'Defines the position of the badge.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-badge-position" class="uk-form-width-medium" ng-model="widget.data['badge_position']">
                            <option value="panel">{{'Panel' | trans}}</option>
                            <option value="title">{{'Title' | trans}}</option>
                        </select>
                    </div>
                </div>

            </li>
            <li>

                <h3 class="wk-form-heading">{{'General' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Link Target' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" title="{{'Enables/disables opening all links in a new window of the browser. Otherwise, they open in the same window.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['link_target']"> {{'Open all links in a new window' | trans}}</label>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-class">{{'HTML Class' | trans}}<span data-uk-tooltip="'cls':'uk-slidesetlightbox-tooltip'" title="{{'Adds a custom CSS class to the widget. You can specify several classes using space between them.' | trans}}"><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <input id="wk-class" class="uk-form-width-medium" type="text" ng-model="widget.data['class']">
                    </div>
                </div>

            </li>
			<li>

                <h3 class="wk-form-heading">{{'About' | trans}}</h3>

				<?php $plugin->printAboutInfo($app);?>

				<h3 class="wk-form-heading">{{'Newsletter' | trans}}</h3>
	
				<?php $plugin->printNewsletterInfo($app);?>
				
				<h3 class="wk-form-heading">{{'Donation' | trans}}</h3>
				<?php $plugin->printDonationInfo($app);?>

            </li>
        </ul>

    </div>
</div>