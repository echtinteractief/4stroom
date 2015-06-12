module.exports = {
    'default': ['build', 'connect', 'watch'],
    'build': ['clean','assemble','copy', 'concat', 'uglify', 'sass'],
    'serve': ['connect', 'watch'],
    'production':['copy:production','watch']
};