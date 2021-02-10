<?php

//Axeptio (cookies)
// Modifier ligne 10 et 11
// Modifier le UA à la ligne 46 pour Google Analytics
// Modifier les 15 chiffres de l'ID du pixel Facebook ligne 33 et 34
function add_coockies_script_axeptio() { ?>
    <script>
    window.axeptioSettings = {
      clientId: "60225262fdfdd75f517306f6",
      cookiesVersion: "charlenezybala-base",
    };
     
    (function(d, s) {
      var t = d.getElementsByTagName(s)[0], e = d.createElement(s);
      e.async = true; e.src = "//static.axept.io/sdk.js";
      t.parentNode.insertBefore(e, t);
    })(document, "script");
    </script>
<?php };
add_action ('wp_footer', 'add_coockies_script_axeptio');   

//Gestion des cookies Google Analytics et Pixel Facebook (ajout puis management)
function rgpd_cookies() { ?>

	<script>
		function launchFB(){ 
			!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
			n.callMethod.apply(n,arguments):n.queue.push(arguments)};
			if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
			n.queue=[];t=b.createElement(e);t.async=!0;
			t.src=v;s=b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t,s)}(window, document,'script',
			'https://connect.facebook.net/en_US/fbevents.js');
			fbq('init', '434866444264026');
			fbq('set','agent','tmgoogletagmanager', '434866444264026');
			fbq('track', 'PageView');
			fbq('track', 'Lead');
		}

		function launchGA(){
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-XXXXXXXXX-X', 'auto');
			ga('send', 'pageview');
    	}	

		void 0 === window._axcb && (window._axcb = []);
		window._axcb.push(function(axeptio) {
			axeptio.on("cookies:complete", function(choices) {
				if(choices.facebook_pixel) {
					launchFB();  
				}
				if(choices.google_analytics) {
					launchGA();
				}
			});
		});
	</script>
<?php
};
add_action( 'wp_head', 'rgpd_cookies' );