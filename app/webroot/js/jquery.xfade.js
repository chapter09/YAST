/*
 * jQuery xFade 2.0
 * http://xfade.firmanw.com/
 *
 * Copyright (c) 2011 Firman Wandayandi
 * Dual licensed under the MIT and GPL licenses.
 */

(function($) {

    $.fn.xfade = function(options) {
        return this.each(function() {
            // The xFade object
            var xfade = {
                settings:   {
                    'children':         null,
                    'width':            null,
                    'height':           null,
                    'effect':           'slide',
                    'speed':            'normal',
                    'order':            'sequence',
                    'timeout':          8000,
                    'easing':           null,
                    'navigation':       null,
                    'prevNext':         false,
                    'wrapperClass':     'xfade',
                    'navigationClass':  'xfade-nav',
                    'autoPlay':         true,
                    'pauseOnHover':     false,
                    'onLoaded':         null,
                    'onBefore':         null,
                    'onComplete':       null
                },

                container:  null,
                timeout:    null,
                current:    0,
                last:       0,
                state:      null,

                // Return the items
                items: function() {
                    var self = this;
                    if (self.settings.children) return $(self.container).children();
                    else return $(self.container).children(self.settings.children);
                },
                
                // Initialization
                init: function(container, options) {
                    var self = this,
                        maxwidth = 0,
                        maxheight = 0;

                    if (options) $.extend(self.settings, options);

                    // Wrap the container
                    self.container = container;
                    var elements = self.items();
                    
                    // Not items found
                    if (elements.length == 0) return;

                    $(self.container)
                    .wrap($('<div />').addClass(self.settings.wrapperClass))
                    .wrap($('<div />').addClass('xfade-container'));

                    // Set the current and last according to the order settings
                    if (self.settings.order == 'random') {
                        self.last = Math.floor(Math.random() * elements.length);
                        do {
                            self.current = Math.floor(Math.random() * elements.length);
                        } while (self.last == self.current );
                    } else if (self.settings.order == 'random-start') {
                        self.current = Math.floor(Math.random() * elements.length);
                        self.settings.order = 'sequence';
                    } else if (self.settings.order != 'sequence') {
                        alert('xfade:order must either be \'sequence\', \'random\' or \'random-start\'');
                    }

                    // Calls the setup routine
                    self.setup(false);

                    for (var i = 0; i < elements.length; i++) {
                        maxwidth = Math.max(maxwidth, $(elements[i]).width());
                        maxheight = Math.max(maxheight, $(elements[i]).height());
                    };

                    // Setup the slide container
                    $(self.container).css({
                        position: 'relative',
                        height: self.settings.height != null ? self.settings.height : maxheight,
                        overflow: 'hidden'
                    });
                    
                    if (self.settings.width != null) $(self.container).css('width', self.settings.width);

                    // Build navigation
                    self.navigation();
                    
                    // Show the first item
                    $(elements[self.current]).fadeIn('normal', function() {
                        // Calls the onLoaded callback function
                        self.onLoaded(self.current, self.last, $(elements[self.current]), $(elements[self.last]), elements);
                    });

                    // Play the animation if auto play
                    if (self.settings.autoPlay) self.play();
                },

                // Setup the items with proper attributes
                setup: function(refresh) {
                    var self = this;

                    $.each(self.items(), function(i, child) {
                        if (refresh) {
                          if (i != self.current && i != self.last) $(child).css({'position': 'absolute', 'top': 0, 'left': 0, 'display': 'none'});
                        } else $(child).css({'position': 'absolute', 'top': 0, 'left': 0, 'display': 'none'});

                        if (self.settings.effect == 'fade') $(child).css('z-index', self.items().length - i);
                        else $(child).css('z-index', 0);
                        
                        if (self.settings.autoPlay && self.settings.pauseOnHover) {
                            $(child).unbind('mouseover.xfade').bind('mouseover.xfade', function() {
                                self.stop();
                            }).unbind('mouseout.xfade').bind('mouseout.xfade', function() {
                                self.play();
                            });
                        }
                    });
                },

                // Build the navigation
                navigation: function(refresh) {
                    var self = this;
                    
                    if (self.settings.navigation == null) return;

                    var $wrapper = $(self.container).parents('.' + self.settings.wrapperClass);

                    if (!refresh && self.settings.prevNext) {
                        var $prevnext = $('<div class="xfade-prevnext" />');
                        $('<a href="#xfade-prev" class="prev">Prev</a>').bind('click.xfade', function() { self.prev(); return false; }).appendTo($prevnext);
                        $('<a href="#xfade-next" class="next">Next</a>').bind('click.xfade', function() { self.next(); return false; }).appendTo($prevnext);
                        $prevnext.appendTo($wrapper);
                    }

                    if (typeof(self.settings.navigation) == 'object' && self.settings.navigation.jquery) { // Navigation supplied is jquery dom object
                        $('a', self.settings.navigation).each(function() {
                            $(this).unbind('click.xfade').bind('click.xfade', function() { self.navigate(this); return false;})
                        });

                        for (var i = 0; i < self.items().length; i++) {
                            // Missing navigation
                            if ($('a[href=#xfade-' + i + ']', self.settings.navigation).length == 0) {
                              var $li = $('<li />');

                              $('<a href="#xfade-' + i + '">' + (i + 1) + '</a>')
                              .unbind('click.xfade').bind('click.xfade', function() { self.navigate(this); return false; })
                              .appendTo($li);
                              $li.appendTo($('ul', self.settings.navigation));
                            }
                        }
                    } else if (self.settings.navigation === true) { // Generate the navigation
                        var $nav = $('<nav>').addClass(self.settings.navigationClass).appendTo($wrapper);
                        var $ul = $('<ul />');
                        for (var i = 0; i < self.items().length; i++) {
                            var $li = $('<li />');

                            $('<a href="#xfade-' + i + '">' + (i + 1) + '</a>')
                            .unbind('click.xfade').bind('click.xfade', function() { self.navigate(this); return false; })
                            .appendTo($li);
                            $li.appendTo($ul);
                        }

                        $ul.appendTo($nav);

                        self.settings.navigation = $nav;
                    }

                    if (!refresh) self.setNavigation();
					
                },

                // Navigate to the proper item according the link
                navigate: function(el) {
                    var match = $(el).attr('href').match(/#xfade-(\d+)/);
                    if (match != null) {
                        // Stop the autoplay
                        this.stop();
                        this.to(match[1]);
                    }
                },

                // Add the current class to current navigation
                setNavigation: function(index) {
                    if (!index) index = this.current;
                    if (typeof(this.settings.navigation) == 'object') {
                        $('a', this.settings.navigation).each(function() {
                            var match = $(this).attr('href').match(/#xfade-(\d+)/);
                            if (match != null && match[1] == index) 
							{
								$(this).addClass('current');
								$(".fade-text").hide();
								$(".fade-text").eq(index).fadeIn(0);

							}
                            else $(this).removeClass('current');
                        });
                    }
                },

                // Play the animation
                animate: function() {
                    var self = this;
                    var elements = self.items();

                    self.onBefore(self.current, self.last, $(elements[self.current]), $(elements[self.last]), elements);

                    if (self.settings.effect == 'slide') { // Slide
                        var width = $(self.container).width()
                        
                        // Initial position
                        $(elements[self.current]).css({'left': width, 'display': '', 'z-index': elements.length});
                        $(elements[self.last]).animate({'left': - width}, self.settings.speed, self.settings.easing, function() {
                          $(this).css({'left': 0, 'z-index': 0, 'display': 'none'});
                        });

                        // Complete position
                        $(elements[self.current]).animate({'left': 0}, self.settings.speed, self.settings.easing, function() {
                            self.onComplete(self.current, self.last, $(elements[self.current]), $(elements[self.last]), elements);
                        });
                    } else if (self.settings.effect == 'roll') { // Roll
                        // Initial position
                        $(elements[self.current]).css({'top': - $(elements[self.last]).outerHeight(), 'display': '', 'z-index': elements.length});
                        $(elements[self.last]).animate({'top': $(elements[self.current]).outerHeight()}, self.settings.speed, self.settings.easing, function() {
                          $(this).css({'left': 0, 'z-index': 0, 'display': 'none'});
                        });

                        // Complete position
                        $(elements[self.current]).animate({'top': 0}, self.settings.speed, self.settings.easing, function() {
                            self.onComplete(self.current, self.last, $(elements[self.current]), $(elements[self.last]), elements);
                        });
                    } else if (self.settings.effect == 'fall') { // Fall
                        // Initial position
                        $(elements[self.last]).css({'z-index': 0});
                        $(elements[self.current]).css({'top': - $(elements[self.current]).outerHeight(), 'display': '', 'z-index': 1});

                        // Complete position
                        $(elements[self.current]).animate({'top': 0}, self.settings.speed, self.settings.easing, function() {
                            $(elements[self.last]).fadeOut('fast');
                            self.onComplete(self.current, self.last, $(elements[self.current]), $(elements[self.last]), elements);
                        });
                    } else if (self.settings.effect == 'fade') { // Fade
                        $(elements[self.last]).fadeOut(self.settings.speed);
                        $(elements[self.current]).fadeIn(self.settings.speed, function() {
                            removeFilter($(this)[0]);
                            self.onComplete(self.current, self.last, $(elements[self.current]), $(elements[self.last]), elements);
                        });
                    } else
                        alert('xfade:effect must either be \'slide\', \'slide-vertical\', \'fall\' or \'fade\'');

                    self.setNavigation();
                },

                // Go to the element
                // The element may and integer of slide item index or a jQuery object
                to: function(element) {
                    var self = this;

                    if (typeof(element) == 'object' && element.jquery) {
                        if (element.length == 0) return false;

                        $.each(self.items(), function(i) {
                            if ($(this)[0] == element[0]) element = i;
                        });
                    }

                    // Currently displaying the item
                    if (self.current == element) return;

                    self.last = self.current;
                    self.current = parseInt(element);
                    self.animate();
                },
                
                // Go to the next item
                next: function() {
                    var self = this;
                    var next = self.current;

                    if (self.settings.order == 'random') {
                        while (next == self.current) next = Math.floor(Math.random() * self.items().length);
                    } else {
                        next++;
                        if (next > this.items().length - 1) next = 0;
                    }

                    this.to(next);
                },
                
                // Go to the previous item
                prev: function() {
                    var self = this;
                    var prev = self.current;

                    if (self.settings.order == 'random') {
                        while (prev == self.current) prev = Math.floor(Math.random() * self.items().length);
                    } else {
                        prev--;
                        if (prev < 0) prev = self.items().length - 1;
                    }

                    this.to(prev);
                },
                
                // Start the playback
                play: function() {
                    var self = this;

                    // Store the playback status
                    $(self.container).data('xfade:playback', 'play');

                    // Set timer for next item
                    timeout = setInterval(function() {
                        // Go to the next item
                        self.next();
                    }, self.settings.timeout);

                    $(self.container).data('xfade:timeout', timeout);
                },

                // Stop the playback
                stop: function() {
                    var self = this;
                    clearInterval($(self.container).data('xfade:timeout'));
                    $(self.container).data('xfade:playback', 'stop');
                },

                // Pause the playback
                pause: function() {
                    var self = this;

                    clearInterval($(self.container).data('xfade:timeout'));
                    $(self.container).data('xfade:playback', 'pause');

                    if (self.settings.autoPlay) self.play();
                },

                // Get the playback status one of 'play', 'pause' or null if never played
                status: function() {
                    var self = this;

                    return {
                        state: self.state,
                        current: self.current,
                        last: self.last
                    };
                },
                
                // Refresh the xFade
                refresh: function() {
                    var self = this;
                    var elements = self.items();

                    // Rebuilds the children with refresh true
                    self.setup(true);
  
                    // Probably also should refresh the navigation
                    self.navigation(true);
                },

                // Trigger after fully loaded
                onLoaded: function(current, last, currentItem, lastItem, elements) {
                    if (typeof(this.settings.onLoaded) == 'function') this.settings.onLoaded(current, last, currentItem, lastItem, elements);
                },
                
                // Trigger before animation
                onBefore: function(current, last, currentItem, lastItem, elements) {
                    if (typeof(this.settings.onBefore) == 'function') this.settings.onBefore(current, last, currentItem, lastItem, elements);
                },

                // Trigger after animation completed
                onComplete: function(current, last, currentItem, lastItem, elements) {
                    if (typeof(this.settings.onComplete) == 'function') this.settings.onComplete(current, last, currentItem, lastItem, elements);
                }
            };

            // Initialize the xFade
            xfade.init(this, options);
            
            // Store the xFade instance
            $(this).data('xfade:instance', xfade);
        });
    };

    $.fn.xfadeTo = function(item) {
        $(this).data('xfade:instance').to(item);
    };

    $.fn.xfadePlay = function() {
        $(this).data('xfade:instance').play();
    }

    $.fn.xfadeStop = function() {
        $(this).data('xfade:instance').stop();
    }

    $.fn.xfadePause = function() {
        $(this).data('xfade:instance').pause();
    }

    $.fn.xfadeStatus = function() {
        return $(this).data('xfade:instance').status();
    }

    $.fn.xfadeRefresh = function(item) {
        $(this).data('xfade:instance').refresh();
    };

})(jQuery);

// **** remove Opacity-Filter in ie ****
function removeFilter(element) {
    if(element.style.removeAttribute){
        element.style.removeAttribute('filter');
    }
}
