'use strict';

module.exports = function() {
    $.gulp.task('js:hammer', function() {
        return $.gulp.src($.path.jsHammer)
            .pipe($.gp.concat('hammer.js'))
            .pipe($.gulp.dest($.config.root + '/assets/js'))
    })
};