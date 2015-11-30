jQuery(document).ready(function(a) {
	a(".radio").on("change",
	function() {
		var b = a(this).val();
		switch (b) {
			case '1' :
				a('.licenseSelector-descriptors').html( '<div class="licenseSelector-descriptor">' + license_message.publicdomain + '</div>' );
				break;
			case '2' :
				a('.licenseSelector-descriptors').html( '<div class="licenseSelector-descriptor">' + license_message.zero + '</div>' );
				break;
			case '3' :
				a('.licenseSelector-descriptors').html( '<div class="licenseSelector-descriptor">' + license_message.ar + '</div>' );
				break;	
			case '4' :
				a('.licenseSelector-descriptors').html( '<div class="licenseSelector-descriptor">' + wp_load_svg('svg-creativeCommonsBy-21px-p0') + license_message.by + '</div>' );
				break;
			case '5' :
				a('.licenseSelector-descriptors').html( '<div class="licenseSelector-descriptor">' + wp_load_svg('svg-creativeCommonsBy-21px-p0') + license_message.by + '</div><div class="licenseSelector-descriptor">' + wp_load_svg('svg-creativeCommonsNd-21px-p0') + license_message.nd + '</div>' );
				break;
			case '6' :
				a('.licenseSelector-descriptors').html( '<div class="licenseSelector-descriptor">' + wp_load_svg('svg-creativeCommonsBy-21px-p0') + license_message.by + '</div><div class="licenseSelector-descriptor">' + wp_load_svg('svg-creativeCommonsSa-21px-p0') + license_message.sa + '</div>' );
				break;
			case '7' :
				a('.licenseSelector-descriptors').html( '<div class="licenseSelector-descriptor">' + wp_load_svg('svg-creativeCommonsBy-21px-p0') + license_message.by + '</div><div class="licenseSelector-descriptor">' + wp_load_svg('svg-creativeCommonsNc-21px-p0') + license_message.nc + '</div>' );
				break;
			case '8' :
				a('.licenseSelector-descriptors').html( '<div class="licenseSelector-descriptor">' + wp_load_svg('svg-creativeCommonsBy-21px-p0') + license_message.by + '</div><div class="licenseSelector-descriptor">' + wp_load_svg('svg-creativeCommonsNc-21px-p0') + license_message.nc + '</div><div class="licenseSelector-descriptor">' + wp_load_svg('svg-creativeCommonsNd-21px-p0') + license_message.nd + '</div>' );
				break;
			case '9' :
				a('.licenseSelector-descriptors').html( '<div class="licenseSelector-descriptor">' + wp_load_svg('svg-creativeCommonsBy-21px-p0') + license_message.by + '</div><div class="licenseSelector-descriptor">' + wp_load_svg('svg-creativeCommonsNc-21px-p0') + license_message.nc + '</div><div class="licenseSelector-descriptor">' + wp_load_svg('svg-creativeCommonsSa-21px-p0') + license_message.sa + '</div>' );
				break;							
		}
	});
});

var wp_load_svg = function( type ){
	var svg = '<svg class="svgIcon" height="21" width="21" viewBox="0 0 21 21"><use class="svgIcon-use" xlink:href="/icons.svg#' + type + '" xmlns:xlink="http://www.w3.org/1999/xlink"></svg>';
	return svg;
}
