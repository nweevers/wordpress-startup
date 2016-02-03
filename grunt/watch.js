module.exports = {
	// options: {
	// 	dateFormat: function(time) {
	// 		grunt.log.writeln('Watching projectdomein.nl...');
	// 	}
	// },
	grunt: {
		files: ['Gruntfile.js']
	},
	js: {
		files: ['src/scripts/**/*.js'],
		tasks: [
			'concat',
			'jshint',
			'todo'
		],
		options: {
			livereload: true
		}
	},
	sass: {
		files: ['src/scss/**/*.scss'],
		tasks: [
			'sprite:normal',
			'sprite:retina',
			'sass:dev',
			'autoprefixer:dev',
			'todo'
		],
		options: {
			livereload: true
		}
	}
};
