# Notes
- Main advantage of the WordPress plugin is the ability to modify WP without modifying core files
- Plugins are easy to share and reuse, rather than to modify your theme/core files
- Use WordPress Core functions if possible
- Use WordPress Coding standards [https://make.wordpress.org/core/handbook/best-practices/coding-standards/]

## When to include a function in the theme vs plugin?
- Theme functions are only for presentation purposes, while plugin functions make changes to the data that might be lost if we left it in the theme.

## Foundation
- Prefix everything with a unique prefix
- Keep your files organized
	- Only have your primary PHP file and uninstall file in the plugins folder. The rest should be in a sub directory
	- Split your plugin into smaller files for performance reasons (eg: Group admin functions together in a file. This will allow you to only load the admin code when the user is viewing admin)
- Don't develop without debugging

## How to keep functions from breaking?
- Use pluggable functions, [https://codex.wordpress.org/Pluggable_Functions]