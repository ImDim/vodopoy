'use strict';

module.exports = function() {
    $.gulp.task('css:compare', function() {
        return $.gulp.src($.path.cssCompare)
            .pipe($.gp.concatCss('images-compare.min.css'))
            .pipe($.gp.csso())
            .pipe($.gulp.dest($.config.root + '/assets/css'))
    })
};
