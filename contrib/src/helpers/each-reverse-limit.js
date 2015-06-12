/**
 * Each Helper (in reverse).
 *
 * {{#each-reverse-limit items 3}}
 * {{/each-reverse-limit}}
 *
 * @param {array} context
 */


(function() {
	module.exports.register = function(Handlebars, options) {
		var grunt  = require('grunt');

		Handlebars.registerHelper("each-reverse-limit", function(context, limit) {
			var options = arguments[arguments.length - 1];
			var ret = '';

			if (context && context.length > 0) {
				var max = Math.min(context.length, limit);
				context = context.reverse();

				for (var i = 0; i < max; i++) {
					ret += options.fn(context[i]);
				}
			} else {
				ret = options.inverse(this);
			}

			return ret;
		});

	};
}).call(this);
