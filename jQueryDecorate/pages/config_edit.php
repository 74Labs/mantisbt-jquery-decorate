<?php


# Copyright (C) 2010 Tomasz Stañczyk, Lab74.org
#
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU Affero General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU Affero General Public License for more details.

form_security_validate('plugin_jQueryDecorate_config_edit');

auth_reauthenticate();
access_ensure_global_level(config_get('manage_plugin_threshold'));

$f_selectors = gpc_get_string('selectors', '');
$f_decorators = gpc_get_string('decorators', '');

if (current_user_is_administrator()) {
	if (plugin_config_get('selectors') != $f_selectors) {
		plugin_config_set('selectors', $f_selectors);
	}
	if (plugin_config_get('decorators') != $f_decorators) {
		plugin_config_set('decorators', $f_decorators);
	}	
}

form_security_purge('plugin_jQueryDecorate_config_edit');

print_successful_redirect(plugin_page('config', true));