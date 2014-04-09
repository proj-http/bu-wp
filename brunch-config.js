exports.config = {
  paths: {
    watched: ['brunch', 'envs', 'bower_components', 'test', 'app', 'public'],
    public: 'public/content/build'
  },
  files: {
    javascripts: {
      joinTo: {
        'javascripts/app.js': /^brunch/
        'javascripts/vendor.js': /^(bower_components|vendor)/
      }
    },
    stylesheets: {
      joinTo: {
        'stylesheets/app.cs': /^brunch/
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
