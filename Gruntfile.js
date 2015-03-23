'use strict';
module.exports = function(grunt) {

  
  // Load all tasks
  require('load-grunt-tasks')(grunt);
  //require('jit-grunt')(grunt);

  // Show elapsed time
  require('time-grunt')(grunt);


  


  var jsFileList = [
    'assets/vendor/bootstrap/js/transition.js',
    // 'assets/vendor/bootstrap/js/alert.js',
    // 'assets/vendor/bootstrap/js/button.js',
    // 'assets/vendor/bootstrap/js/carousel.js',
    'assets/vendor/bootstrap/js/collapse.js',
    // 'assets/vendor/bootstrap/js/dropdown.js',
    // 'assets/vendor/bootstrap/js/modal.js',
    'assets/vendor/bootstrap/js/tooltip.js',
    // 'assets/vendor/bootstrap/js/popover.js',
    'assets/vendor/bootstrap/js/scrollspy.js',
    // 'assets/vendor/bootstrap/js/tab.js',
    // 'assets/vendor/bootstrap/js/affix.js',
    'assets/vendor/raphael/raphael.js',
    'assets/js/plugins/*.js',
    'assets/js/_*.js'
  ];

  grunt.initConfig({
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'assets/js/*.js',
        '!assets/js/scripts.js',
        '!assets/**/*.min.*'
      ]
    },
    sass: {
      dev: {
        options: {
          outputStyle: 'nested',
          sourceMap: true
        },
        files: { 'assets/css/main.css': 'assets/scss/styles.scss' }
      },
      build: {
        options: {
          outputStyle: 'compressed',
          sourceMap: true
        },
        files: { 'assets/css/main.min.css': 'assets/scss/styles.scss' }
      }

    },
    concat: {
      options: {
        separator: ';',
      },
      dist: {
        src: [jsFileList],
        dest: 'assets/js/scripts.js',
      },
    },
    uglify: {
      dist: {
        files: {
          'assets/js/scripts.min.js': [jsFileList]
        }
      }
    },
    autoprefixer: {
      options: {
        browsers: ['last 2 versions', 'ie 8', 'ie 9', 'android 2.3', 'android 4', 'opera 12']
      },
      dev: {
        options: {
          map: true
        },
        src: 'assets/css/main.css'
      },
      build: {
        options: {
          map: true
        },
        src: 'assets/css/main.min.css'
      }
    },
    modernizr: {
      build: {
        devFile: 'assets/vendor/modernizr/modernizr.js',
        outputFile: 'assets/js/vendor/modernizr.min.js',
        files: {
          'src': [
            ['assets/js/scripts.min.js'],
            ['assets/css/main.min.css']
          ]
        },
        uglify: true,
        parseFiles: true
      }
    },
    version: {
      default: {
        options: {
          format: true,
          length: 32,
          manifest: 'assets/manifest.json',
          querystring: {
            style: 'roots_css',
            script: 'roots_js'
          }
        },
        files: {
          'lib/scripts.php': 'assets/{css,js}/{main,scripts}.min.{css,js}'
        }
      }
    },
    notify: {
      options: {
        enabled: true,
        max_jshint_notifications: 5, // maximum number of notifications from jshint output
        title: "Project Name" // defaults to the name in package.json, or will use project directory's name
      }
    },
    watch: {
      sass: {
        files: [
          'assets/scss/*.scss',
          'assets/scss/**/*.scss'
        ],
        tasks: [
          'sass:dev', 
          'autoprefixer:dev'
        ]
      },
      js: {
        files: [
          jsFileList,
          '<%= jshint.all %>'
        ],
        tasks: ['jshint', 'concat']
      },
      livereload: {
        // Browser live reloading
        // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
        options: {
          livereload: true
        },
        files: [
          'assets/css/main.css',
          'assets/js/scripts.js',
          'templates/*.php',
          '*.php'
        ]
      }
    }
  });


  // Register tasks
  grunt.registerTask('default', [
    'dev'
  ]);
  grunt.registerTask('dev', [
    'jshint',
    'sass:dev',
    'autoprefixer:dev',
    'concat',
    'notify'
  ]);
  grunt.registerTask('build', [
    'jshint',
    'sass:build',
    'autoprefixer:build',
    'uglify',
    'modernizr',
    'version',
    'notify'
  ]);

};
