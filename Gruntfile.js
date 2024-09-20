const path = require("path");

module.exports = function (grunt) {
  grunt.initConfig({
    webpack: {
      myConfig: {
        entry: "./assets/public/src/js/child-default.js", // Entry point
        output: {
          path: path.resolve(__dirname, "assets/public/dist/js"),
          filename: "child.min.js",
        },
        mode: "production",
        module: {
          rules: [
            {
              test: /\.js$/,
              exclude: /node_modules/,
              use: {
                loader: "babel-loader",
                options: {
                  presets: ["@babel/preset-env"],
                },
              },
            },
          ],
        },
      },
    },
    sass: {
      options: {
        implementation: require("node-sass"), // Use node-sass as the compiler
        outputStyle: "compressed", // or 'compressed'
      },
      dist: {
        files: {
          "assets/public/dist/css/child.min.css":
            "assets/public/src/scss/style.scss",
        },
      },
    },
    watch: {
      css: {
        files: "assets/public/src/scss/**/*.scss",
        tasks: ["sass"],
      },
      js: {
        files: "assets/public/src/js/**/*.js",
        tasks: ["webpack"],
      },
    },
  });

  grunt.loadNpmTasks("grunt-sass");
  grunt.loadNpmTasks("grunt-webpack");
  grunt.loadNpmTasks("grunt-contrib-watch");

  grunt.registerTask("default", ["sass", "webpack"]);
};
