/**
 *
 * Module: grunt-preprocess
 * Documentation: https://npmjs.org/package/grunt-preprocess
 *
 */

module.exports = {

	// Task: Auto Prefixing

	theme_prefix: {
		options: {
			map       : false,
			processors: [
				require('autoprefixer')({browsers: ['last 3 versions', 'ie 9']})
			]
		},
		files  : {
			'<%= pkg._themepath %>/css/master.css' : '<%= pkg._themepath %>/css/master-temp.css',
			'<%= pkg._themepath %>/css/print.css'  : '<%= pkg._themepath %>/css/print-temp.css'
		}
	},

	theme_wp_editor_prefix: {
		options: {
			map: false,
			processors: [
				require('autoprefixer')({browsers: ['last 3 versions', 'ie 9']})
			]
		},
		files  : {
			'<%= pkg._themepath %>/css/admin/editor-style.css' : '<%= pkg._themepath %>/css/admin/editor-style-temp.css'
		}
	},

	theme_wp_login_prefix: {
		options: {
			map       : false,
			processors: [
				require('autoprefixer')({browsers: ['last 3 versions', 'ie 9']})
			]
		},
		files  : {
			'<%= pkg._themepath %>/css/admin/login.css' : '<%= pkg._themepath %>/css/admin/login-temp.css'
		}
	},

	theme_legacy_prefix: {
		options: {
			map       : false,
			processors: [
				require('autoprefixer')({browsers: ['last 20 versions', 'ie 6']})
			]
		},
		files  : {
			'<%= pkg._themepath %>/css/legacy.css' : '<%= pkg._themepath %>/css/legacy-temp.css'
		}
	},

	// Task: Minification

	theme_min: {
		options: {
			map       : false,
			processors: [
				require('cssnano')()
			]
		},
		files  : {
			'<%= pkg._themepath %>/css/dist/master.min.css' : '<%= pkg._themepath %>/css/master.css',
			'<%= pkg._themepath %>/css/dist/print.min.css'  : '<%= pkg._themepath %>/css/print.css'
		}
	},

	theme_wp_editor_min: {
		options: {
			map       : false,
			processors: [
				require('cssnano')()
			]
		},
		files  : {
			'<%= pkg._themepath %>/css/admin/dist/editor-style.min.css' : '<%= pkg._themepath %>/css/admin/editor-style.css'
		}
	},

	theme_wp_login_min: {
		options: {
			map       : false,
			processors: [
				require('cssnano')()
			]
		},
		files  : {
			'<%= pkg._themepath %>/css/admin/dist/login.min.css' : '<%= pkg._themepath %>/css/admin/login.css'
		}
	},

	theme_legacy_min: {
		options: {
			map       : false,
			processors: [
				require('cssnano')()
			]
		},
		files  : {
			'<%= pkg._themepath %>/css/dist/legacy.min.css' : '<%= pkg._themepath %>/css/legacy.css'
		}
	}

};