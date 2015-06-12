/**
 * Created by rlamme on 03/04/15.
 */

/**
 * Epoch date format Helper.
 *
 * {{format-epoch epochunixtimestamp}}
 *
 * @param {int} context
 */


(function() {
	module.exports.register = function(Handlebars, options) {
		var grunt  = require('grunt');

		Handlebars.registerHelper("format-epoch", function(timestamp) {
			var dateVal = '/Date('+ parseInt(timestamp) +'000)/';
			var date = new Date( parseFloat( dateVal.substr(6 )));
			var monthNames = [
				"januari", "februari", "maart",
				"april", "mei", "juni",
				"juli", "augustus", "september",
				"oktober", "november", "december"
			];

			var datetime =  date.getDate() + "-" +
							(date.getMonth() + 1) + "-" +
							date.getFullYear();

			return datetime;
		});

	};
}).call(this);

