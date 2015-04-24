function getHash(defaultVal)
{
	defaultVal = defaultVal || '';
	var hash = defaultVal;
	if(window.location.hash || window.location.hash === 0){
		hash = window.location.hash.substring(1);
	}
	return hash;
}
function nl2br (str, is_xhtml) {
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}