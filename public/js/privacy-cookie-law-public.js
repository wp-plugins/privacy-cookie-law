jQuery(document).ready(function () {
    
    if (jQuery('.pcl').length) {
        jQuery('.plc-close').click(function() {
            jQuery('.pcl').hide('slow');
            
            SetCookie('wordpress_pcl_close', 1, 1);
        })
    }
});

function SetCookie(cookieName, cookieValue, nDays) {
    var today = new Date();
    var expire = new Date();
    if (nDays === null || nDays === 0) {
        nDays = 1;
    }
    
    expire.setTime(today.getTime() + 3600000 * 24 * nDays);
    document.cookie = cookieName + "=" + escape(cookieValue)
            + ";expires=" + expire.toGMTString() + ";path=/";
}