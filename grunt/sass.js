var files = {
		'content/themes/basis/resources/css/all.css': 'src/scss/all.scss'
	};

module.exports = {
	dev: {
		options: {
			sourceMap: true,
			outputStyle: 'expanded'
		},
		files: files
	},
	prod: {
		options: {
			sourceMap: false,
			outputStyle: 'compressed'
		},
		files: files
	}
};
