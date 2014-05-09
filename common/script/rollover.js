function initRollovers() {
	if (!document.getElementById) return
	var aPreLoad = new Array();
	var sTempSrc;
	var aImages = document.getElementsByTagName('img');
	for (var i = 0; i < aImages.length; i++) {
		if (aImages[i].className.match( 'rollover')) {
			var src = aImages[i].getAttribute('src');
			var fstart = src.lastIndexOf('/');
			if(! fstart) fstart = 0;
			var filename = src.substring(fstart, src.length);
			var hsrc = src.replace(filename, '/over'+filename);
			aImages[i].setAttribute('hsrc', hsrc);
			aPreLoad[i] = new Image();
			aPreLoad[i].src = hsrc;
			aImages[i].onmouseover = function() {
				sTempSrc = this.getAttribute('src');
				this.setAttribute('src', this.getAttribute('hsrc'));
			}	
			aImages[i].onmouseout = function() {
				if (!sTempSrc) sTempSrc = this.getAttribute('src').replace('/over'+filename, filename);
				this.setAttribute('src', sTempSrc);
			}
			if (aImages[i].className.match( 'on')) {
				aImages[i].src = hsrc;
			}
		}
	}
	
	var aImages = document.getElementsByTagName('input');
	for (var i = 0; i < aImages.length; i++) {
		if (aImages[i].className.match( 'rollover')) {
			var src = aImages[i].getAttribute('src');
			var fstart = src.lastIndexOf('/');
			if(! fstart) fstart = 0;
			var filename = src.substring(fstart, src.length);
			var hsrc = src.replace(filename, '/over'+filename);
			aImages[i].setAttribute('hsrc', hsrc);
			aPreLoad[i] = new Image();
			aPreLoad[i].src = hsrc;
			aImages[i].onmouseover = function() {
				sTempSrc = this.getAttribute('src');
				this.setAttribute('src', this.getAttribute('hsrc'));
			}	
			aImages[i].onmouseout = function() {
				if (!sTempSrc) sTempSrc = this.getAttribute('src').replace('/over'+filename, filename);
				this.setAttribute('src', sTempSrc);
			}
			if (aImages[i].className.match( 'on')) {
				aImages[i].src = hsrc;
			}
		}
	}
}

function pageTop() {
    var x1 = x2 = x3 = 0;
    var y1 = y2 = y3 = 0;

    if (document.documentElement) {
        x1 = document.documentElement.scrollLeft || 0;
        y1 = document.documentElement.scrollTop || 0;
    }

    if (document.body) {
        x2 = document.body.scrollLeft || 0;
        y2 = document.body.scrollTop || 0;
    }

    x3 = window.scrollX || 0;
    y3 = window.scrollY || 0;

    var x = Math.max(x1, Math.max(x2, x3));
    var y = Math.max(y1, Math.max(y2, y3));

    window.scrollTo(Math.floor(x / 2), Math.floor(y / 2));

    if (x > 0 || y > 0) {
        window.setTimeout("pageTop()", 25);
    }
}
