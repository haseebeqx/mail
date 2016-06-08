/**
 * ownCloud - Mail
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Tahaa Karim <tahaalibra@gmail.com>
 * @copyright Tahaa Karim 2016
 */

define(function(require) {
	'use strict';

	var $ = require('jquery');
	var _ = require('underscore');
	var Marionette = require('marionette');
	var Handlebars = require('handlebars');
	var AccountController = require('controller/accountcontroller');
	var Radio = require('radio');
	var AccountSettingsTemplate = require('text!templates/accountsettings.html');

	return Marionette.ItemView.extend({
		template: Handlebars.compile(AccountSettingsTemplate),
		ui: {
			// TODO
		},
		events: {
			// events add, update and remove alias
		},
		initialize: function(options) {
			// TODO
		},
		onShow: function() {
            // TODO
		}
	});
});
