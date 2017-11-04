var wh = window.innerHeight,
ww = window.innerWidth,
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

window.onload = function () {
	set_section_heights();
	if (document.getElementById('sub-menu-1')) {
		set_bottom_menu();
	}
	if (document.getElementsByClassName('cta')) {
		set_cta();
	}
};

window.onresize = function () {
	set_section_heights();
	if (document.getElementById('sub-menu-1')) {
		set_bottom_menu();
	}
};

window.pageYOffset.onchange = function() {alert('it worked!');};

page_footer = document.getElementById('page-footer').offsetTop;

/*document.onwheel = scroll_setup;

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
		current_offset = getClosestSection( currentY, section_offsets );
		current = section_id[current_offset];
		console.log( 'Index ' + current_offset + ' ' + current + ' current section' );
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
};*/

function set_section_heights() {
	wh = window.innerHeight;
	for (var i = 0; i < sections.length; i++) {
		if ( sections[i].id == 'under-header' || sections[i].id == 'content-section' ) {

		} else {
			sections[i].style.height = wh + 'px';
			section_id.push( sections[i].id );
			section_offsets.push( sections[i].offsetTop );
		}
	}
}

function set_bottom_menu() {
	ww = window.innerWidth;
	var bottom_menu = document.getElementById('sub-menu-1').children,
	li_width = ww / bottom_menu.length / ww * 100 - 0.5,
	add_divs = '';
	document.getElementById('page-footer').style.height = '450px';
	document.getElementById('main').style.paddingBottom = '450px';

	for (var i = 0; i < bottom_menu.length; i++) {
		bottom_menu[i].style.width = li_width + '%';
		add_divs = bottom_menu[i].children[0].innerHTML;
		bottom_menu[i].children[0].innerHTML = '<div class="text-slide text-top">' + add_divs + '</div><div class="text-slide text-bottom">' + add_divs + '</div>';
	}
}

function set_cta() {
	var call_to_actions = document.getElementsByClassName('cta');
	var cta_children = '';
	var g_cta = '';
	for (var i = 0; i < call_to_actions.length; i++) {
		g_cta = call_to_actions[i].children[0].innerHTML;
		call_to_actions[i].children[0].innerHTML = '<div class="text-slide text-top">' + g_cta + '</div><div class="text-slide text-bottom">' + g_cta + '</div>';
	}
}