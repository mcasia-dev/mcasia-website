/*
 * Magazine sample
*/

var pageImageCache = {};

function pageAssetPath(page, suffix, extension) {
	return 'product_catalog_flip_page_assets/pages/' + page + suffix + '.' + extension;
}

function assetCandidates(page, suffix) {
	return [
		pageAssetPath(page, suffix, 'webp'),
		pageAssetPath(page, suffix, 'jpg'),
		pageAssetPath(page, suffix, 'png')
	];
}

function loadImageWithFallback(img, candidates, done) {
	var index = 0;

	function tryNext() {
		if (index >= candidates.length) {
			return;
		}

		var src = candidates[index++];

		img.off('error.catalogFallback').on('error.catalogFallback', tryNext);
		img.attr('src', src);
	}

	img.off('load.catalogLoad').on('load.catalogLoad', function() {
		img.off('error.catalogFallback');

		if (done) {
			done.call(this);
		}
	});

	tryNext();
}

function preloadPageAssets(page) {
	var totalPages = $('.magazine').turn('pages');

	if (page < 1 || (totalPages && page > totalPages) || pageImageCache[page]) {
		return;
	}

	pageImageCache[page] = true;

	$.each(assetCandidates(page, ''), function(_, src) {
		var image = new Image();
		image.src = src;
		return false;
	});
}

function addPage(page, book) {

	var id, pages = book.turn('pages');

	// Create a new element for this page
	var element = $('<div />', {});

	// Add the page to the flipbook
	if (book.turn('addPage', element, page)) {

		// Add the initial HTML
		// It will contain a loader indicator and a gradient
		element.html('<div class="gradient"></div><div class="loader"></div>');

		// Load the page
		loadPage(page, element);
	}

}

function loadPage(page, pageElement) {

	// Create an image element

	var img = $('<img />');
	img.attr('draggable', 'false');

	img.mousedown(function(e) {
		e.preventDefault();
	});

	loadImageWithFallback(img, assetCandidates(page, ''), function() {

		// Set the size
		$(this).css({width: '100%', height: '100%'});

		// Add the image to the page after loaded

		$(this).appendTo(pageElement);

		// Remove the loader indicator

		pageElement.find('.loader').remove();
	});

	loadRegions(page, pageElement);

}

// Zoom in / Zoom out

function zoomTo(event) {

		setTimeout(function() {
			if ($('.magazine-viewport').data().regionClicked) {
				$('.magazine-viewport').data().regionClicked = false;
			} else {
				if ($('.magazine-viewport').zoom('value')==1) {
					$('.magazine-viewport').zoom('zoomIn', event);
				} else {
					$('.magazine-viewport').zoom('zoomOut');
				}
			}
		}, 1);

}



// Load regions

function loadRegions(page, element) {

	$.getJSON('product_catalog_flip_page_assets/pages/'+page+'-regions.json').
		done(function(data) {

			$.each(data, function(key, region) {
				addRegion(region, element);
			});
		});
}

// Add region


// Process click on a region

function regionClick(event) {

	var region = $(event.target);

	if (region.hasClass('region')) {

		$('.magazine-viewport').data().regionClicked = true;

		setTimeout(function() {
			$('.magazine-viewport').data().regionClicked = false;
		}, 100);

		var regionType = $.trim(region.attr('class').replace('region', ''));

		return processRegion(region, regionType);

	}

}

// Process the data of every region

function processRegion(region, regionType) {


	switch (regionType) {
		case 'link' :

			window.open(data.url);

		break;
		case 'zoom' :

			var regionOffset = region.offset(),
				viewportOffset = $('.magazine-viewport').offset(),
				pos = {
					x: regionOffset.left-viewportOffset.left,
					y: regionOffset.top-viewportOffset.top
				};

			$('.magazine-viewport').zoom('zoomIn', pos);

		break;
		case 'to-page' :

			$('.magazine').turn('page', data.page);

		break;
	}

}

// Load large page

function loadLargePage(page, pageElement) {

	var img = $('<img />');
	img.attr('draggable', 'false');

	loadImageWithFallback(img, assetCandidates(page, '-large').concat(assetCandidates(page, '')), function() {

		var prevImg = pageElement.find('img');
		$(this).css({width: '100%', height: '100%'});
		$(this).appendTo(pageElement);
		prevImg.remove();

	});
}

// Load small page

function loadSmallPage(page, pageElement) {

	var img = pageElement.find('img');

	img.css({width: '100%', height: '100%'});

	loadImageWithFallback(img, assetCandidates(page, ''), function() {
		$(this).css({width: '100%', height: '100%'});
	});
}

// http://code.google.com/p/chromium/issues/detail?id=128488

function isChrome() {

	return navigator.userAgent.indexOf('Chrome')!=-1;

}

function disableControls(page) {
		preloadPageAssets(page + 1);
		preloadPageAssets(page + 2);
		preloadPageAssets(page - 1);

		if (page==1)
			$('.previous-button').hide();
		else
			$('.previous-button').show();

		if (page==$('.magazine').turn('pages'))
			$('.next-button').hide();
		else
			$('.next-button').show();
}

// Set the width and height for the viewport

function resizeViewport() {

	var width = $(window).width(),
		height = $(window).height(),
		options = $('.magazine').turn('options');

	$('.magazine').removeClass('animated');

	$('.magazine-viewport').css({
		width: width,
		height: height
	}).
	zoom('resize');


	if ($('.magazine').turn('zoom')==1) {
		var bound = calculateBound({
			width: options.width,
			height: options.height,
			boundWidth: Math.min(options.width, width),
			boundHeight: Math.min(options.height, height)
		});

		if (bound.width%2!==0)
			bound.width-=1;


		if (bound.width!=$('.magazine').width() || bound.height!=$('.magazine').height()) {

			$('.magazine').turn('size', bound.width, bound.height);

			if ($('.magazine').turn('page')==1)
				$('.magazine').turn('peel', 'br');

			$('.next-button').css({height: bound.height, backgroundPosition: '-38px '+(bound.height/2-32/2)+'px'});
			$('.previous-button').css({height: bound.height, backgroundPosition: '-4px '+(bound.height/2-32/2)+'px'});
		}

		$('.magazine').css({top: -bound.height/2, left: -bound.width/2});
	}

	var magazineOffset = $('.magazine').offset(),
		boundH = height - magazineOffset.top - $('.magazine').height(),
		marginTop = (boundH - $('.thumbnails > div').height()) / 2;

	if (marginTop<0) {
		$('.thumbnails').css({height:1});
	} else {
		$('.thumbnails').css({height: boundH});
		$('.thumbnails > div').css({marginTop: marginTop});
	}

	if (magazineOffset.top<$('.made').height())
		$('.made').hide();
	else
		$('.made').show();

	$('.magazine').addClass('animated');

}


// Number of views in a flipbook

function numberOfViews(book) {
	return book.turn('pages') / 2 + 1;
}

// Current view in a flipbook

function getViewNumber(book, page) {
	return parseInt((page || book.turn('page'))/2 + 1, 10);
}

function moveBar(yes) {
	if (Modernizr && Modernizr.csstransforms) {
		$('#slider .ui-slider-handle').css({zIndex: yes ? -1 : 10000});
	}
}

function setPreview(view) {

	var previewWidth = 112,
		previewHeight = 73,
		previewSrc = 'product_catalog_flip_page_assets/pages/preview.jpg',
		preview = $(_thumbPreview.children(':first')),
		numPages = (view==1 || view==$('#slider').slider('option', 'max')) ? 1 : 2,
		width = (numPages==1) ? previewWidth/2 : previewWidth;



	preview.css({
		width: width,
		height: previewHeight
	});

	if (preview.css('background-image')==='' ||
		preview.css('background-image')=='none') {

		preview.css({backgroundImage: 'url(' + previewSrc + ')'});

		setTimeout(function(){
			_thumbPreview.removeClass('no-transition');
		}, 0);

	}

	preview.css({backgroundPosition:
		'0px -'+((view-1)*previewHeight)+'px'
	});
}

// Width of the flipbook when zoomed in

function largeMagazineWidth() {

	return 2214;

}

// decode URL Parameters

function decodeParams(data) {

	var parts = data.split('&'), d, obj = {};

	for (var i =0; i<parts.length; i++) {
		d = parts[i].split('=');
		obj[decodeURIComponent(d[0])] = decodeURIComponent(d[1]);
	}

	return obj;
}

// Calculate the width and height of a square within another square

function calculateBound(d) {

	var bound = {width: d.width, height: d.height};

	if (bound.width>d.boundWidth || bound.height>d.boundHeight) {

		var rel = bound.width/bound.height;

		if (d.boundWidth/rel>d.boundHeight && d.boundHeight*rel<=d.boundWidth) {

			bound.width = Math.round(d.boundHeight*rel);
			bound.height = d.boundHeight;

		} else {

			bound.width = d.boundWidth;
			bound.height = Math.round(d.boundWidth/rel);

		}
	}

	return bound;
}
