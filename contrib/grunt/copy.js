module.exports = {
    img: {
        files: [
            {
                src: '**',
                cwd: 'src/images',
                dest: 'build/images/',
                expand: true
            }
        ]
    },
   	script: {
		files: [
            {
                src: ['**/*.js', '*.map'],
                cwd: 'src/scripts/',
                dest: 'build/scripts/',
                expand: true
            }
        ]
    },
    assets: {
	    files: [
		    {
			    src: ['**'],
                cwd: 'src/style/gfx/',
                dest: 'build/style/gfx/',
                expand: true
		    }
	    ]
    },
    fonts: {
	     files: [
		    {
			    src: ['**'],
                cwd: 'src/style/fonts/',
                dest: 'build/style/fonts/',
                expand: true
		    }
	    ]
    },
    production: {
	    files:[
		    {
			    src: ['**'],
                cwd: 'build/style/css/',
                dest: '../library/style/css/',
                expand: true 
		    },
		    {
			    src: ['**'],
                cwd: 'build/style/fonts/',
                dest: '../library/style/fonts/',
                expand: true 
		    },
		    {
			    src: ['**'],
                cwd: 'build/style/gfx/',
                dest: '../library/style/gfx/',
                expand: true 
		    },
		    {
			    src: ['**'],
                cwd: 'build/scripts/',
                dest: '../library/scripts/',
                expand: true 
		    }
	    ]
    }
 }