module.exports = {
	options: {
    	prefix : 'shape-', // This will prefix each <g> ID
    	mode                : {
            view            : {         // Activate the «view» mode
                bust        : false,
                render      : {
                    scss    : true      // Activate Sass output (with default options)
                }
            },
            symbol          : true      // Activate the «symbol» mode
        }
	},
	default : {
		files: {
			'src/style/gfx/svg/svg-defs.svg': ['src/style/gfx/svg/*.svg'],
		}
	}
};