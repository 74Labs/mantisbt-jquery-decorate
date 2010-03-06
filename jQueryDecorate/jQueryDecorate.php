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

/**
 * Provides access to the jQuery Decorate plugin as a MantisBT plugin.
 */
class jQueryDecoratePlugin extends MantisPlugin {

	function register() {
		$this->name = 'jQuery Decorate Plugin';
		$this->description = lang_get('plugin_jQueryDecorate_description');
		$this->page = 'config';

		$this->version = '1.0.0';
		$this->requires = array (
			'MantisCore' => '1.2.0',
			'jQuery' => '1.3.2'
		);

		$this->author = 'Tomasz Sta&#324;czyk';
		$this->contact = 'tomasz.stanczyk@lab74.org';
		$this->url = 'http://www.lab74.org';
	}

	function config() {
		return array (
			'selectors' => "table",
			'decorators' => 'ui-widget-content ui-corner-all'
		);
	}

	function hooks() {
		return array (
			'EVENT_LAYOUT_RESOURCES' => 'resources',
			'EVENT_LAYOUT_RESOURCES_JQUERY_ONLOAD' => 'onload'
		);
	}

	/**
	 * Create the resource link to load the jQuery Decorate plugin.
	 */
	function resources($p_event) {
		$html = '<script type="text/javascript" src="' . plugin_file('script.js') . '"></script>' . "\n";
		return $html;
	}

	/**
	 * Create the onload script to initialize jQuery Decorate plugin.
	 */
	function onload($p_event) {
		$selectors = explode(';', plugin_config_get('selectors'));
		$decorators = explode(';', plugin_config_get('decorators'));
		$html = '';
		for($i = 0; $i < count($selectors); $i++) {
			$html .= '$("' . $selectors[$i] . '").decorate({cssClass: "' . $decorators[$i] . '"});' ."\n";				
		}
		return $html;
	}
}