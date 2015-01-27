function getHash(defaultVal)
{
	defaultVal = defaultVal || '';
	var hash = defaultVal;
	if(window.location.hash || window.location.hash === 0){
		hash = window.location.hash.substring(1);
	}
	return hash;
}