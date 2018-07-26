// ==============================================
// Colorswatches integration script.
// !! Theme should work with colorswatches without lightboxpro first
// ==============================================
document.observe("dom:loaded", function () {
    if ('undefined' !== typeof ProductMediaManager) {
        ProductMediaManager.createZoom = ProductMediaManager.createZoom.wrap(function(original, image) {
            original(image);
            var img = $j('.main-image img');

            // prevent image size increasing
            function imageLoaded(img) {
                img.addClass('resized')
                    .css({
                        'max-height': img.height()
                    });
            }

            var alt = img.attr('alt');
            img.attr('alt', ''); // remove alt to calculte image height properly
            if (!img.hasClass('resized') && img.height()) {
                imageLoaded(img);
            } else {
                img.load(function() {
                    imageLoaded(img);
                });
            }
            img.attr('alt', alt);

            $j('.main-image').attr('href', image.attr('src'));
            var srcset = img.attr('srcset'),
                newSrc = image.attr('src');
            img.attr('src', newSrc);

            if (srcset) {
                if (image.attr('srcset')) {
                    img.attr('srcset', image.attr('srcset'));
                } else {
                    var newSrcset = '';
                    srcset.split(',').each(function(rule) {
                        rule = rule.split(' ');
                        newSrcset = newSrc + ' ' + rule[1];
                    });
                    img.attr('srcset', newSrcset);
                }
            }
        });

        ProductMediaManager.swapImage = ProductMediaManager.swapImage.wrap(function(original, targetImage) {
            original(targetImage);

            // targetImage = $j(targetImage);
            // targetImage.addClass('gallery-image');

            var imageGallery = $j('.product-img-box');

            if (targetImage[0].complete) {
                // ProductMediaManager.createZoom(targetImage);
            } else {
                imageGallery.addClass('loading');
                imagesLoaded(targetImage, function() {
                    imageGallery.removeClass('loading');
                    // ProductMediaManager.createZoom(targetImage);
                });
            }
        });
    }
});
