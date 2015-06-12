/**
 * Created by sebastian.fitzner on 19.03.14.
 * From Prototype Generator
 * @use: {{#limit 0 3 data}}{{/limit}}
 */

(function () {
	module.exports.register = function (Handlebars, options) {
		/*
		 * Item helper.
		 *
		 * @return n elements
		 */
		Handlebars.registerHelper('limit', function (from, to, context, options) {
			var item = "";
			for (var i = from, j = to; i < j; i++) {
				item = item + options.fn(context[i]);
			}
			return item;
		});
	};
}).call(this);