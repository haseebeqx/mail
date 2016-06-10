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
		currentAccount: null,
		ui: {
			'form': 'form',
			'alias': 'input[name="alias"]',
			'submitButton': 'input[type=submit]'
		},
		events: {
			'click @ui.submitButton': 'onSubmit',
			'submit @ui.form': 'onSubmit'
		},
		initialize: function(options) {
			this.currentAccount = require('state').currentAccount;

		},
		onShow: function() {
            // TODO
		},
		onSubmit: function(e) {
			e.preventDefault();
			e.stopPropagation();

			var alias = this.ui.alias.val();
			var url = OC.generateUrl('/apps/mail/accounts/{id}/aliases', {
				id: this.currentAccount.get('id')
			});
			var data = {
				type: 'POST',
				success: function(data) {

				},
				error: function(xhr) {

				},
				data: {
					accountId: this.currentAccount.get('id'),
					alias: alias
				}
			};
			$.ajax(url, data);

		}
	});
});
