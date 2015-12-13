![Slidesetlightbox widget logo](https://raw.githubusercontent.com/rvalitov/widgetkit-slidesetlightbox/master/images/logo.png)
# Overview
**Slidesetlightbox** is an advanced [Slideset widget](http://yootheme.com/demo/widgetkit/joomla/index.php/home/slideset) for [Yootheme Widgetkit2](https://yootheme.com/widgetkit). After installation it becomes available in the Widgets list as a "native" widget and can be used with any [Warp 7 theme](https://yootheme.com/themes).

## Features
Or why it's better than original Slideset provided by Yootheme?
* **Lightbox support** - you may choose how the widget will respond to user clicks: standard behavior or [lightbox mode](http://getuikit.com/docs/lightbox.html).
* **Backward compatibility** - all other behavior, styling and features of the original [Slideset widget](http://yootheme.com/demo/widgetkit/joomla/index.php/home/slideset) are preserved.

# Supported platforms
* The code is based on Widgetkit 2.5.0, however it should work with any Widgetkit 2.4.x and later.
* Joomla 3.4.x or later required
I didn't test it with Wordpress.

# Installation
## Installation Overview
We use "clean" and "neat" approach according to the official Yootheme's manual:
* [Custom widgetkit plugin](http://yootheme.com/widgetkit/documentation/customizing/custom-widget-plugin)
* [Where to store your customizations](https://yootheme.com/widgetkit/documentation/customizing/where-to-store-your-customizations)

Such approach allows you to:
* keep original Yootheme's Widgetkit source files
* preserve original Yootheme's functionality
* safely do updates to Yootheme's files (download new versions of Widgetkit 2), keeping our new widget (modifications won't be overwritten during update process)

## Installation Process
The installation is very simple. You just need to copy the folder _slidesetlightbox_ to _/templates/THEME-NAME/widgetkit/widgets/_, so that you will have a folder _/templates/THEME-NAME/widgetkit/widgets/slidesetlightbox_. The _THEME-NAME_ is a folder of your [Warp 7 theme](https://yootheme.com/themes), e.g. it can be _yoo_vida_, _yoo_finch_, etc. 

# Setup and usage
## Configure the widget
After successful installation you should see the _Slideset Lightbox_ widget in the widgetkit control panel page, so that you can select it from the list:
![Slidesetlightbox widget](https://raw.githubusercontent.com/rvalitov/widgetkit-slidesetlightbox/master/images/widgetkit-list.jpeg)

You should configure the widget as usual, e.g. the [Yootheme documentation](http://yootheme.com/demo/widgetkit/joomla/index.php/home/slideset) can be useful.

All the advanced features of the Slidesetlightbox are located in a dedicated section called _Advanced Features_:
![Slidesetlightbox widget settings screen](https://raw.githubusercontent.com/rvalitov/widgetkit-slidesetlightbox/master/images/settings.jpeg)
If you don't activate any of these features, then the Slidesetlightbox behaves exactly as the original Slideset widget from the Widgetkit bundle.

Options and description:
* **Lightbox Type** - defines the behavior how widget responds to user clicks, possible values:
    + **none** - standard behavior, the widget works the same way as the original Slideset widget does.
    + **Lightbox** - lightbox opens with "full size" image, user can switch between the images using array buttons (image grouping is implemented) in the lightbox mode without closing it.

# Authors, Contributors and Acknowledgment
* This widget is created by [Ramil Valitov](http://www.valitov.me).
* The code is based on the original [Slideset widget](http://yootheme.com/demo/widgetkit/joomla/index.php/home/map) by [Yootheme](http://yootheme.com/).

# Feedback
Your feedback is very appreciated. If you want to see new features in this module, please, post your ideas and feature requests in the [issue tracker](https://github.com/rvalitov/widgetkit-slidesetlightbox/issues).

# Support or Contact
Having trouble with MapEx Widget? May be something has already been described in the [Wiki area](https://github.com/rvalitov/widgetkit-slidesetlightbox/wiki) or reported in the [issue tracker](https://github.com/rvalitov/widgetkit-slidesetlightbox/issues). If you don't find your problem there, then, please, add your issue there. 

Being a free project which I do in my spare time, I hope you understand that I can't offer 24/7 support:) You may contact me via e-mail ramilvalitov@gmail.com, I will try to answer to all of them (if such messages imply an answer), however, not immediately, it may take a few days or a week... so, just be patient. 

Note, that I can answer only to questions and problems directly related to MapEx widget. Answers to basic questions about the widgetkit nature and simple help about how to use widgets in general or how to use Joomla you can find in appropriate forums:
* [Joomla](http://forum.joomla.org/)
* [Widgetkits](https://yootheme.com/support)
