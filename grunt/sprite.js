module.exports = {
	normal: {
        src: 'src/img/sprite/*.png',
        dest: 'content/themes/basis/resources/sprites/sprite.png',
        destCss: 'src/scss/generic/_sprite.scss',
        imgPath: '../sprites/sprite.png',
        cssVarMap: function (sprite) {
          	sprite.name = 'sprite_' + sprite.name;
        }
    },
    retina: {
    	src: 'src/img/sprite2x/*.png',
    	dest: 'content/themes/basis/resources/sprites/sprite2x.png',
    	destCss: 'src/scss/generic/_sprite2x.scss',
    	imgPath: '../sprites/sprite2x.png',
    	cssVarMap: function (sprite) {
    	  	sprite.name = 'sprite2x_' + sprite.name;
    	}
    }
};
