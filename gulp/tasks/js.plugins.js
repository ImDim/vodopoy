'use strict';

module.exports = function() {
    $.gulp.task('js:plugins', function() {
        return $.gulp.src($.path.jsPlugins)
            .pipe($.gp.concat('plugins.js'))
            .pipe($.gulp.dest($.config.root + '/assets/js'))
    })
};
