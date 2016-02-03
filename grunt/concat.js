module.exports = {
	options: {
		separator: ';'
	},
	prod: {
		files: [
			{
				src: [
					'src/bower_components/fastclick/lib/fastclick.js',
					'src/scripts/functions.js',
					'src/scripts/fitvids.js',
					'src/scripts/all.js'
				],
				dest: 'content/themes/basis/resources/scripts/all.min.js',
				options: {
					sourceMap: true
				}
			},
			{
				src: [
					'src/bower_components/headjs/dist/1.0.0/head.load.min.js',
					'src/scripts/libs/modernizr.min.js'
				],
				dest: 'content/themes/basis/resources/scripts/libs/header.min.js'
			}
			/*,
			{
				src: [
					'src/bower_components/jquery/dist/jquery.min.js'
				],
				dest: 'content/themes/basis/resources/scripts/libs/jquery.min.js'
			}*/
		]
	}
};
