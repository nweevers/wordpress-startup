var files = {
		'content/themes/basis/resources/css/all.css': 'content/themes/basis/resources/css/all.css'
	},
	browsers = ['last 2 versions', 'ie 9'];

module.exports = {
	dev: {
		options: {
			browsers: browsers,
			map: true
		},
		files: files
	},
	prod: {
		options: {
			browsers: browsers,
			map: false
		},
		files: files
	}
};
