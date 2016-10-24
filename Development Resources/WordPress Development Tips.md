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
	- Or this by Automattic - https://wordpress.org/plugins/developer/
	- Exit if user tries to access plugin from outside of WordPress
		- if ( ! defined( ‘ABSPATH’ ) ) exit; // Exit if accessed directly
	- Use QueryPosts to find specific helper functions - http://queryposts.com

#More Tips
Taken from various sites
	- Avoid God Objects
		-  God Objects are objects that know or do too much. The point of object-oriented programming is taking a large problem and breaking it into smaller parts. By having functions do too much, it’s hard to follow that logic and a bug will be harder to fix. Instead of having massive functions, break them down into smaller pieces.
	- Turn on WP_DEBUG
		-	Always develop with WP_DEBUG mode on, so you can see all PHP warnings sent to the screen. It’s usually things like making sure a variable is set before checking the value
	- Make it extensible
		-Developers should use WordPress actions and filters to allow for modification/customization without users having to touch the plugin’s core code base. And if your plugin creates a front-end output, it’s recommended to have a templating engine in place so users can create custom template files in their theme’s WooCommerce folder that overwrites the plugin’s template files.
	- Separate Business Logic and Presentation Logic
		- It’s a good practice to separate business logic (i.e., how the plugin works) from presentation logic (i.e., how it looks). Two separate pieces of logic are more easily maintained and swapped if necessary. An example is to have two different classes — one for displaying the end results, and one for the admin settings page.
	- Use Transients to store offsite information
		-If you provide a service via an API, it’s best to store that information so future queries can be done faster, and the load on your service is lessened. WordPress transients can be used to store data for a certain amount of time.
	- Log Data
		- You may want to log data that can be useful for debugging purposes. This is great with two conditions:
			- Allow any logging as an ‘opt in’.
			- Use the WC_Logger class. A user can then view logs on their system status page.
	- UI for Service Integration plugins
		- If your plugin relies on connecting to an external service (for example, your service is a payment gateway, shipping method, or other service integration), it’s important to inform your users that a connection is required in order to use the plugin. To do this, we recommend an admin notice, linking to the specific service integration screen within WooCommerce.
	- Check if WooCommerce is active
			if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			    // Put your plugin code here
			}
	- Custom WordPress Tables
		- Creating custom database tables should be avoided. Whenever possible, you should always use WordPress post types, taxonomies, and options.
			- Consider the permanence of your data. Here’s a quick primer:
				If the data may not always be present (i.e., it expires), use a transient.
				If the data is persistent but not always present, consider using the WP Cache.
				If the data is persistent and always present, consider the wp_options table.
				If the data type is an entity with n units, consider a post type.
				If the data is a means or sorting/categorizing an entity, consider a taxonomy.
				Logs should be written to a file using the WC_Logger class.

#For WordPress Themes
https://codex.wordpress.org/Theme_Development
- Use get_template_part
- Extend get_template_part with function variables