module.exports =  {
	options: {
		flatten: false,
		layout: 'page.hbs',
		layoutdir: 'src/template/',
		partials: 'src/template/partials/*.hbs',
		helpers: [
			'diy-handlebars-helpers',
			'handlebars-helpers',
			'handlebars-layouts',
			'helper-moment',
			'prettify',
			'src/helpers/*.js'
		],
		prettify: {
			condense: true,
			padcomments: true,
			indent: 4
		},
		data: [
			'package.json',
			'src/data/*.json'
		],
		collections: [{
			name: 'mainmenu',
			sortby: 'sortorder',
			sortorder: 'ascending' // [ 'ascending', 'descending' ]
		}]
	},
	pages: {
		files: [{
			cwd: 'src/pages',
			dest: 'build/pages',
			expand: true,
			src: ['**/*.hbs', '**/*.md']
		}]
	} //,
	//posts: {
	//	files: [{
	//		cwd: '<%= dir.content %>',
	//		dest: '<%= dir.dist %>',
	//		expand: true,
	//		src: ['blog/*.hbs', 'blog/*.md']
	//	}]
	//}
}