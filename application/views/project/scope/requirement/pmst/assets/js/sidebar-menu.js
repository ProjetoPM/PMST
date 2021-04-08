(function () {
	if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
		var body = document.getElementsByTagName('body')[0];
		body.className = body.className + ' sidebar-collapse';
	}
})();