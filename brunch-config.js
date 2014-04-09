exports.config = {
  paths: {
    watched: ['brunch', 'envs', 'bower_components', 'test', 'app', 'public'],
    public: 'public/build'
  },
  files: {
    javascripts: {
      joinTo: {
        'javascripts/app.js': /^brunch/,
        'javascripts/vendor.js': /^(bower_components|vendor)/
      }
    },
    stylesheets: {
      joinTo: {
        'stylesheets/app.css': /^(bower_components|brunch)/
      }
    },
    templates: {
      precompile: true,
      root: 'templates',
      joinTo: {
        'javascripts/app.js': /^brunch/
      }
    }
  }
};
