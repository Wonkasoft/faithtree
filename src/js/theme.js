var wh = window.innerHeight,
main = document.getElementById('main'),
sections = main.getElementsByTagName('section'),
section_id = [],
section_offsets = [],
current_section = '',
page_footer = '',
scrollY = 0,
distance = 40,
speed = 15,
current = '',
next = '',
canCall = true;

for (var i = 0; i < sections.length; i++) {
	sections[i].style.height = wh + 'px';
	section_id.push( sections[i].id );
	section_offsets.push( sections[i].offsetTop );
}
page_footer = document.getElementById('page-footer').offsetTop;

document.onwheel = scroll_setup;

function scroll_setup() {
	if (!canCall) {
		return;
	} else {
		canCall = false;
		setTimeout ( function() {
			canCall = true;
		}, 500);
		var currentY = window.pageYOffset;
			console.log(currentY +' new currentY');
			console.log(section_offsets +' array');
		current_index = getClosestSection( currentY, section_offsets );
		current = section_id[current_index];
		console.log( 'Index ' + current_index + ' ' + current + ' current section' );
		check = document.getElementById( current ).offsetTop;
			console.log(check +' check offset');	
		currentY = window.pageYOffset;
			console.log(currentY +' currentY for comparing');
		if ( currentY > check ) {
			console.log('scrolled down');
			if (section_id.indexOf(current) !== section_id.length - 1 ) {
				scroller_coster_down(current);
			}
		} else {
			console.log('scrolled up');
			if (section_id.indexOf(current) !== 0 ) {
				scroller_coster_up(current);
			}
		}
	}
};

function scroller_coster_up(el) {
	var currentY = window.pageYOffset;
	next = section_id.indexOf(current);
	el = section_id[next - 1];
	var targetY = document.getElementById( el ).offsetTop,
	animator = setTimeout('scroller_coster_up(\'' + el + '\')', speed);
	if ( currentY > targetY ) {
		scrollY = currentY-distance;
		window.scroll( 0, scrollY );
	} else {
		clearTimeout(animator);
		window.scrollTo( 0, targetY );
		if (section_id.indexOf(current) !== 0 ) {
			current = section_id[next - 1];
			console.log(current + ' next section up');
		}
	}
};

function scroller_coster_down(el) {
	var currentY = window.pageYOffset;
	next = section_id.indexOf(current);
	el = section_id[next + 1];
	var targetY = document.getElementById( el ).offsetTop,
	bodyHeight = document.body.offsetHeight,
	yPos = currentY + window.innerHeight,
	animator = setTimeout('scroller_coster_down(\'' + el + '\')', speed);
	if ( yPos > bodyHeight ) {
		clearTimeout(animator);
	} else {
		if ( currentY < targetY ) {
			scrollY = currentY+distance;
			window.scroll( 0, scrollY );
		} else {
			clearTimeout(animator);
			window.scrollTo( 0, targetY );
			if (section_id.indexOf(current) !== section_id.length - 1 ) {
				current = section_id[next + 1];
				console.log(current + ' next section down');
			}
		}
	}
};

function getClosestSection( num, array ) {
	var i = 0, closest, closestDiff, currentDiff, count = 1;
	if ( array.length ) {
		closest = array[0];
		for (i; i < array.length; i++) {
			if (num >= closest) {
				closestDiff = Math.abs( num - closest );
			} else {
				closestDiff = Math.abs( closest - num );
			}
			if ( num >= array[i] ) {
				currentDiff = Math.abs( num - array[i] );
			} else {
				currentDiff = Math.abs( array[i] - num );
			}

			if ( currentDiff < closestDiff ) {
				closest = array[i];
				console.log(closest);
				break;
			}
		}
		//returns first element that is closest to number
		return closest;
	}
	//no length
	return false;
};