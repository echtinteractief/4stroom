module.exports = {
	dev: {
		options: {
			style: 'compressed',
			quiet: true,
			compass:false,
			sourcemap:'none'
		},
		files: {
			'build/style/css/style.min.css': 'src/style/scss/vierstroom.scss'
		}
	}
};// end sass