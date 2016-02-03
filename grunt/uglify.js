module.exports = {
	prod: {
		options: {
			sourceMap: false,
			mangle: false
		},
		files: [
			{
				src: 'content/themes/basis/resources/scripts/all.min.js',
				dest: 'content/themes/basis/resources/scripts/all.min.js'
			},
			{
				src: 'content/themes/basis/resources/scripts/libs/header.min.js',
				dest: 'content/themes/basis/resources/scripts/libs/header.min.js'
			}
		]
	}
};
