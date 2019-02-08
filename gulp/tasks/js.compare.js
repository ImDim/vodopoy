'use strict';

module.exports = function() {
    $.gulp.task('js:compare', function() {
        return $.gulp.src($.path.jsCompare)
            .pipe($.gp.concat('compare.js'))
            .pipe($.gulp.dest($.config.root + '/assets/js'))
    })
};