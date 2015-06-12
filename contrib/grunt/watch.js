module.exports = {
	html: {
        files: ['src/template/**/*.hbs', 'src/pages/**/*.hbs','src/data/*.json'],
        tasks: ['assemble']
    },
    img: {
        files: ['src/images/**'],
        tasks: ['copy:img']
    },
    script: {
        files: ['src/scripts/*.js','src/scripts/**/*.js', 'src/scripts/modules/**/*.js'],
        tasks: ['copy:script','concat', 'uglify', 'copy:production']
    },
   	sass: {
		files: ['src/style/scss/**'],
		tasks: ['sass','copy:production']
	},
	assets: {
		files: 'src/style/gfx/**',
		tasks: ['copy:assets', 'copy:production']
	},
	fonts: {
		files: 'src/style/fonts/**',
		tasks: ['copy:fonts']
	}
};