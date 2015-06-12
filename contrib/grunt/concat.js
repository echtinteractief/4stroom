module.exports = {
	 dist: {
        src: [
            'build/scripts/libs/**/*.js',
            'build/scripts/modules/*.js',
            'build/scripts/*.js'
        ],
        dest: 'build/scripts/production/script.js',
    }
}