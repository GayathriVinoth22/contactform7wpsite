
jQuery(document).ready(function(){
		jQuery('input[name=referer-page]').val(decodeURIComponent(getCookie("externalRefer")));
		jQuery('input[name=current-page]').val(jQuery(location).attr('href'));
		});
		
		
  	function getCookie(name) {
	  var value = "; " + document.cookie;
	  var parts = value.split("; " + name + "=");
	  if (parts.length == 2) return parts.pop().split(";").shift();
	}
