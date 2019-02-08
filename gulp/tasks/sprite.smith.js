'use strict';

module.exports = function() {
    $.gulp.task('sprite', function () {
        return $.gulp.src('./source/images/icons/*.png')
            .pipe($.gp.spritesmith({
                imgName: 'sprite.png',
                cssName: 'sprite.scss',
                cssFormat: 'css',
                imgPath: '../img/sprite.png',
                padding: 70
            }))
            .img.pipe($.gulp.dest($.config.root + '/assets/img/sprite'))
            .pipe($.gulp.dest($.config.source + '/style/sprite/'));
    });
};