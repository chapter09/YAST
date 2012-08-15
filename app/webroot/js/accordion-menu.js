// Collapseable Menu (Accordion)
$(document).ready(function() {
			setTimeout(function() {
				// Accordion
				$('#accordion > li > span.expanded + ul').slideToggle('medium');
				$('#accordion > li > span').click(function() {
					$('#accordion > li > span.expanded').not(this).toggleClass('expanded').toggleClass('collapsed').parent().find('> ul').slideToggle('medium');
					$(this).toggleClass('expanded').toggleClass('collapsed').parent().find('> ul').slideToggle('medium');
				});
			}, 250);
		});

