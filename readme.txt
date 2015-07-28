=== Site Icon Pro ===
Contributors: lucaspiller
Tags: theme, favicon, app icon, admin, blog, wordpress, image, images, graphic, graphics, icon, iphone, ios, apple touch, retina, multisite, site icon
Requires at least: 4.0
Tested up to: 4.3
Stable tag: 1.0.0
License: GPL-2.0+

Site Icon Pro gives you full control over the exact icons and HTML used to display the favicon and app icons on your Wordpress site!

== Description ==

Site Icon Pro gives you full control over the exact icons and HTML used to display the favicon and app icons on your Wordpress site! By default the Site Icon functionality 
autogenerates and uses the same icon for each platform. Different platforms have different recommend styles, so if you want greater control over which Site Icon is used on each, this is the plugin for you!

Site Icon Pro allows you to specify the exact HTML meta and link tags that are used to display site icons so you get complete control. If you want an icon with a transparent background in browsers, but a white background on iOS, you can do it with this! Unlike editing a theme directly, your changes won't be lost if you upgrade or switch themes.

Note that this is a plugin for advanced users, if you aren't comfortable editing HTML please stick to the built in Site Icon functionality (in Wordpress 4.3+).

= Icon Formats =

Although there are various automated tools that will resize an image to every favion resolution, for full control you should generate each icon seperately. Each platform has different guidelines for how favicons should look and how they behave. Additionality automated tools will resize your images rather poorly - you will be able to generate much better quality favicons by resizing them yourself from a vector image.

We recommend you upload the following icons:

* ICO - 16x16px low resolution icon on a transparent background (some tools let you combine multiple resolutions in a single file, in that case also add a 32x32px version)
* PNG - 32x32px retina icon on a transparent background
* Apple Touch / iOS - PNG format 180x180px on coloured background (iOS will display a transparent icon on a black background, so specify the background colour for full control)

= Contributing =

If you would like to contribute to this plugin, please visit our [GitHub repository](https://github.com/BlissfulPlugins/site-icon-pro).

== Installation ==

= From your WordPress dashboard (Automatic Installation) =

1. Visit 'Plugins > Add New'
2. Search for 'Site Icon Pro'
3. Activate Site Icon Pro from your Plugins page.

= From WordPress.org (Manual Installation) =

1. Download Site Icon Pro.
2. Upload the 'site-icon-pro' directory to your '/wp-content/plugins/' directory, using your favorite method (ftp, sftp, scp, etc...)
3. Activate Site Icon Pro from your Plugins page.

= Once Activated =

1. Visit 'Settings > Site Icon Pro' and edit the HTML to generate your icons there. You should upload your icons to 'wp-content' via FTP / SSH / etc.

= Upgrading from a previous version =

1. Visit your Wordpress dashboard
2. Click 'Plugins'
3. Click 'Update Now' in the 'Site Icon Pro' section.

Alternatively follow the instructions above to install the plugin manually, deleting any old 'site-icon-pro' directory.

== Frequently Asked Questions ==

= Does the plugin support multisite installations? =

Yes, each site can have its own HTML to display Site Icons.

= Where can I get support? =

Feel free to open a thread at [the Site Icon Pro support forum](https://wordpress.org/support/plugin/site-icon-pro).

== Screenshots ==

1. The settings page. You can specify the exact HTML used to display your Site Icons.
2. How your icon will look in Google Chrome on OS X (non-retina).
3. How your icon will look on Internet Explorer 8 on Windows XP.
4. How your icon will look on iOS 8 (retina).

== Changelog ==

= 1.0.0 =

* Initial release.
