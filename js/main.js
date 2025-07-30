// Todays Date
$(function() {
	var interval = setInterval(function() {
		var momentNow = moment();
		$('#today-date').html(momentNow.format('DD') + ' ' + ' '
		+ momentNow.format('- dddd').substring(0, 12));
	}, 100);
});

$(function() {
	var interval = setInterval(function() {
		var momentNow = moment();
		$('#todays-date').html(momentNow.format('DD MMMM YYYY'));
	}, 100);
});

// Loading
$(function() {
	$("#loading-wrapper").fadeOut(3000);
});

// Textarea characters left
$(function() {
	$('#characterLeft').text('140 characters left');
	$('#message').keydown(function () {
		var max = 140;
		var len = $(this).val().length;
		if (len >= max) {
			$('#characterLeft').text('You have reached the limit');
			$('#characterLeft').addClass('red');
			$('#btnSubmit').addClass('disabled');            
		} 
		else {
			var ch = max - len;
			$('#characterLeft').text(ch + ' characters left');
			$('#btnSubmit').removeClass('disabled');
			$('#characterLeft').removeClass('red');            
		}
	});
});

// Todo list
$('.todo-body').on('click', 'li.todo-list', function() {
	$(this).toggleClass('done');
});

// Tasks
(function($) {
	var checkList = $('.task-checkbox'),
	toDoCheck = checkList.children('input[type="checkbox"]');
	toDoCheck.each(function(index, element) {
		var $this = $(element),
		taskItem = $this.closest('.task-block');
		$this.on('click', function(e) {
			taskItem.toggleClass('task-checked');
		});
	});
})(jQuery);

// Tasks Important Active
$('.task-actions').on('click', '.important', function() {
	$(this).toggleClass('active');
});

// Tasks Important Active
$('.task-actions').on('click', '.star', function() {
	$(this).toggleClass('active');
});

// Custom Sidebar JS
jQuery(function ($) {
	// Dropdown menu
	$(".sidebar-dropdown > a").click(function () {
		$(".sidebar-submenu").slideUp(200);
		if ($(this).parent().hasClass("active")) {
			$(".sidebar-dropdown").removeClass("active");
			$(this).parent().removeClass("active");
		} else {
			$(".sidebar-dropdown").removeClass("active");
			$(this).next(".sidebar-submenu").slideDown(200);
			$(this).parent().addClass("active");
		}
	});

	//toggle sidebar
	$("#toggle-sidebar").click(function () {
		$(".page-wrapper").toggleClass("toggled");
	});

	// Pin sidebar on click
	$("#pin-sidebar").click(function () {
		if ($(".page-wrapper").hasClass("pinned")) {
			// unpin sidebar when hovered
			$(".page-wrapper").removeClass("pinned");
			$("#sidebar").unbind( "hover");
		} else {
			$(".page-wrapper").addClass("pinned");
			$("#sidebar").hover(
				function () {
					// console.log("mouseenter");
					$(".page-wrapper").addClass("sidebar-hovered");
				},
				function () {
					// console.log("mouseout");
					$(".page-wrapper").removeClass("sidebar-hovered");
				}
			)
		}
	});

	// Pinned sidebar
	$(function() {
		$(".page-wrapper").hasClass("pinned");
		$("#sidebar").hover(
			function () {
				$(".page-wrapper").addClass("sidebar-hovered");
			},
			function () {
				$(".page-wrapper").removeClass("sidebar-hovered");
			}
		)
	});

	// Toggle sidebar overlay
	$("#overlay").click(function () {
		$(".page-wrapper").toggleClass("toggled");
	});

	// Added by Srinu 
	$(function(){
		// When the window is resized, 
		$(window).resize(function(){
			// When the width and height meet your specific requirements or lower
			if ($(window).width() <= 768){
				$(".page-wrapper").removeClass("pinned");
			}
		});
		// When the window is resized, 
		$(window).resize(function(){
			// When the width and height meet your specific requirements or lower
			if ($(window).width() >= 768){
				$(".page-wrapper").removeClass("toggled");
			}
		});
	});
	
	// Dropdown sub menu
	$(".sidebar-submenu1").slideUp(200);
	$(".sidebar-dropdown1 > a").click(function () { 
		$(".sidebar-submenu1").slideUp(200);
		if ($(this).parent().hasClass("active")) {
			$(".sidebar-dropdown1").removeClass("active");
			$(this).parent().removeClass("active");
		} else {
			$(".sidebar-dropdown1").removeClass("active");
			$(this).next(".sidebar-submenu1").slideDown(200);
			$(this).parent().addClass("active");
		}
	});
});
function swalConfirm(title, text, functionname, idvalue, noCallback) {
	Swal.fire({
		title: title,
		text: text,
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#009688',
		cancelButtonColor: '#d33',
		cancelButtonText: 'No',
		confirmButtonText: 'Yes'
	}).then((result) => {
		if (result.isConfirmed) {
			functionname(idvalue);
		} else if (noCallback) {
			noCallback();
		}
	});
}