module.exports = function(grunt) {
	require('time-grunt')(grunt);
  	require('load-grunt-config')(grunt);

  	grunt.task.run('notify_hooks');

	grunt.registerTask('default', [
		'sprite:normal',
		'sprite:retina',
		'jshint',
		'sass:dev',
		'concat',
		'autoprefixer:dev',
		'todo'
	]);

	grunt.registerTask('production', [
		'sprite:normal',
		'sprite:retina',
		'jshint',
		'sass:prod',
		'concat',
		'autoprefixer:prod',
		'uglify:prod'
	]);
};
