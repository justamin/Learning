#Notes
- Main advantage of the WordPress plugin is the ability to modify WP without modifying core files
- Plugins are easy to share and reuse, rather than to modify your theme/core files

#Foundation
- Prefix everything with a unique prefix
- Keep your files organized
	- Only have your primary PHP file and uninstall file in the plugins folder. The rest should be in a sub directory
	- Split your plugin into smaller files for performance reasons (eg: Group admin functions together in a file. This will allow you to only load the admin code when the user is viewing admin)
	- Avoid a God function