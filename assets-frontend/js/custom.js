     $(document).ready(function() {
              var owl = $('.owl-qoute');
              owl.owlCarousel({
                items: 1,
				  nav: true,
				  center: true,
                loop: true,
                margin: 15,
                autoplay: true,
                autoplayTimeout: 2000,
				  lazyLoad:true,
                autoplayHoverPause: true,
				  
				  responsive: {
			0: {
				items: 1
			},
			600: {
				items: 1
			},
			1000: {
				items: 1
			}
		}
              });
           
            });