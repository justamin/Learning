#WordPress Development Tips

This document extends the Programming Tips file, for more WordPress specific tips

#For Basic WordPress Development
https://codex.wordpress.org

#For more on WordPress Plugin development
https://developer.wordpress.org/plugins/
- Understand hooks, actions and filters
	- Actions - adds, modifies and removes certain functionality
		- Add Actions - https://developer.wordpress.org/reference/functions/add_action/
		- Actions Reference - https://codex.wordpress.org/Plugin_API/Action_Reference
	- Filters - adds, modifies and removes certain data
		- Add Filters - https://developer.wordpress.org/reference/functions/add_filter/
		- Filters Reference - https://codex.wordpress.org/Plugin_API/Filter_Reference
	- Custom Hooks - https://developer.wordpress.org/plugins/hooks/custom-hooks/
		- Filter Hooks Steps
			- Add filter hook
			- Specify what the filter does (by writing the function)
			- Apply filter to the data by first checking using has_filter
	- WP Hooks Database - http://adambrown.info/p/wp_hooks
	- Uninstall Hooks when your plugin is being deleted
	- Load script/style via enqueuing
		- https://developer.wordpress.org/reference/functions/wp_enqueue_script/
		- https://developer.wordpress.org/reference/functions/wp_enqueue_style/
	- Limit user capabilities with user_can
	- Add shortcode - https://developer.wordpress.org/reference/functions/add_shortcode/
	- Always prefix functions and variable names
	- Comment your code liberally. Like telling yourself one year from now what the various functions and classes would do.
	- Group similar functions together.
	- Secure your plugin via validating data, sanitizing input & escaping output.
	- Use plugins like Debug Bar and Query Monitor
	- Exit if user tries to access plugin from outside of WordPress
		- if ( ! defined( ‘ABSPATH’ ) ) exit; // Exit if accessed directly

#For WordPress Themes
https://codex.wordpress.org/Theme_Development
- Use get_template_part
- Extend get_template_part with function variables