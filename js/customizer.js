/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	//Drop down menu in top navigation
	$('#primary-menu li').hover(
        function () {
            //show submenu
            $('ul', this).show();
        }, function () {
            //hide submenu
            $('ul', this).hide();
        });

    //Show/hide the top navigation on scroll
    let navBar = document.getElementById('navContainer');
    let content = document.getElementById('content');
    let arrow = document.getElementById('topArrow');
    let prevScrollPos = window.pageYOffset;
    
    window.onscroll = function() {
        
        let currentScrollPos = window.pageYOffset;

        if(this.window.matchMedia("(min-width: 781px)").matches) {
            if(currentScrollPos > 105 && prevScrollPos > currentScrollPos) {
                navBar.style.position = 'fixed';
                navBar.style.top = '-150px';
                content.style.paddingTop = '150px'; 
            }
            
            if(currentScrollPos < 105) {
                navBar.style.position = 'static';
                content.style.paddingTop = '0';
                $(arrow).css('display', 'none');
            }

            if(currentScrollPos > 105) {
                if (prevScrollPos > currentScrollPos) {
                    navBar.style.top = "-100px";
                    $(arrow).css('display', 'block');
                    $(arrow).css('opacity', '1');
                } 
            }

            if(currentScrollPos > 300) {
                if (prevScrollPos < currentScrollPos) {
                    navBar.style.top = "-150px";
                    $(arrow).css('display', 'block');
                    $(arrow).css('opacity', '0');
                }
            }

            prevScrollPos = currentScrollPos;
        }

        if(this.window.matchMedia("(max-width: 780px)").matches) {
            if(currentScrollPos > 20 && prevScrollPos > currentScrollPos) {
                navBar.style.position = 'fixed';
                navBar.style.top = '-60px';
                content.style.paddingTop = '60px'; 
            }

            if(currentScrollPos < 20) {
                navBar.style.position = 'static';
                content.style.paddingTop = '0'; 
            }

            if(currentScrollPos > 20) {
                if (prevScrollPos > currentScrollPos) {
                    navBar.style.top = "-2px";
                } 
            }

            if(currentScrollPos > 300) {
                if (prevScrollPos < currentScrollPos) {
                    navBar.style.top = "-60px";
                }
            }
            prevScrollPos = currentScrollPos;
        }

    }

    //Mobile menu for top navigation
    //Show side menu
    $('#mobileMenuIcon').click(
        function() {
            $('#sideNav').show();
        }
    )
    //Hide side menu
    $('#sideNav').click(
        function(e) {
            if(String(e.target) == '[object HTMLInputElement]') {
                return;
            }
            $(this).hide();
        }
    )

    $(window).resize(function() {
        if(this.window.matchMedia("(min-width: 781px)").matches) {
            $('#sideNav').hide();
            $(arrow).css('opacity', '0');
        }
    })

    // Disable related posts
    let p = document.getElementsByTagName('p');
    for(let i = 0; i < p.length; i++) {
      if(p[i].innerHTML === "&nbsp;") {
        p[i].innerHTML = "";
      }
    }

} )( jQuery );
