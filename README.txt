=== Site Icon Pro ===
Contributors: lucaspiller
Tags: theme, favicon, admin, blog, wordpress, image, images, graphic, graphics, icon, iphone, ios, apple touch, retina, multisite, site icon
Requires at least: 4.0
Tested up to: 4.3
Stable tag: 1.0
License: GPL-2.0+

Easily add a Favicon to your site and the WordPress admin pages. Complete with upload functionality. Supports all three Favicon types (ico,png,gif).

== Description ==

Site Icon Pro adds the ability to easily upload and customise the favicon of your Wordpress site. It supports multiple plugin formats so you can have full control over what favicon is displayed on what device. Additionally you can specify different favicons for the frontend and backend (Wordpress admin).

= Icon Formats =

Although there are various automated tools that will resize an image to every favion resolution, for full control you should generate each icon seperately. Each platform has different guidelines for how favicons should look and how they behave. Additionality automated tools will resize your images rather poorly - you will be able to generate much better quality favicons by resizing them yourself from a vector image.

We recommend you upload the following icons:

* ICO - 16x16px low resolution icon on a transparent background (some tools let you combine multiple resolutions in a single file, in that case also add a 32x32px version)
* PNG - 32x32px retina icon on a transparent background
* Apple Touch / iOS - PNG format 180x180px on coloured background (iOS will display a transparent icon on a black background, so specify the background colour for full control)

The plugin also lets you upload a GIF icon which allows you to specify an animated favicon - support among browsers is limited though.

= Localization =

See our [FAQ](http://wordpress.org/extend/plugins/site-icon-pro/faq/) for a guide on contributing translations.

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

1. Visit 'Settings > Site Icon Pro' and upload your favicons there.

= Upgrading from a previous version =

1. Visit your Wordpress dashboard
2. Click 'Plugins'
3. Click 'Update Now' in the 'Site Icon Pro' section.

Alternatively follow the instructions above to install the plugin manually, deleting any old 'site-icon-pro' directory.

== Frequently Asked Questions ==

= Internet Explorer: Why does my favicon show up in the backend but not in the frontend or not at all? =

Internet Explorer behaves weird, not only when favicons are concerned. You may take a look at this
[FAQ](http://jeffcode.blogspot.com/2007/12/why-doesnt-favicon-for-my-site-appear.html).

= Why is Site Icon Pro not available in my language? =

Unfortunately we don't speak your language, if you'd like to contribute a translation please see the steps below!

= How do I translate Site Icon Pro? =

Take a look at the WordPress site and identify [your language code](http://codex.wordpress.org/WordPress_in_Your_Language):
e.g. the language code for German is `de_DE`.

  1. download [POEdit](http://www.poedit.net/)
  2. download Site Icon Pro (from your FTP server or from [WordPress.org](http://wordpress.org/extend/plugins/site-icon-pro/))
  3. copy the file `localization/aio-favicon-en_EN.po` and rename it. (in this case `aio-favicon-de_DE.po`)
  4. open the file with POEdit.
  5. translate all strings. Things like `{total}` or `%1$s` mean that a value will be inserted later.
  6. The string that says "English translation by Arne ...", this is where you put your name, website (or email) and your language in. ;-)
  7. (optional) Go to POEdit -> Catalog -> Settings and enter your name, email, language code etc
  8. Save the file. Now you will see two files, `aio-favicon-de_DE.po` and `aio-favicon-de_DE.mo`.
  9. Upload your files to your FTP server into the Site Icon Pro directory (usually `/wp-content/plugins/site-icon-pro/`)
  10. When you are sure that all translations are working correctly, send the po-file to me and I will put it into the next Site Icon Pro version.

= My question isn't answered here. What do I do now? =

Feel free to open a thread at [the Site Icon Pro support forum](https://wordpress.org/support/plugin/site-icon-pro).

== Screenshots ==

1. The settings page. You can specify different icon types, and different icons for the frontend and backend (admin) of your site.
2. How your icon will look in Google Chrome on OS X (non-retina).
3. How your icon will look on Internet Explorer 8 on Windows XP.
4. How your icon will look on iOS 8 (retina).

== Changelog ==

= 1.0 =

* Initial release.
