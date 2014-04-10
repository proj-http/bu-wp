exports.config = {
  plugins: {
    react: {
      autoIncludeCommentBlock: true,
      harmony: true
    }
  },
  paths: {
    watched: ['brunch', 'envs', 'test'],
    public: 'public/build'
  },
  modules: {
    nameCleaner: function(path) {
      return path.replace(/^brunch\//, '');
    }
  },
  files: {
    javascripts: {
      joinTo: {
        'javascripts/app.js': /^brunch/,
        'javascripts/vendor.js': /^(bower_components)/
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
