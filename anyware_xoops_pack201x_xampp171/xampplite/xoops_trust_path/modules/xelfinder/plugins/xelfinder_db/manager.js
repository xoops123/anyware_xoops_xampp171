function get_thumb_xelfinder(name, file) {
	if (file.url.match(/\?/)) {
		file.tmb = file.url.replace('=view', '=tmb&s=_tmbsize_');
	} else {
		file.tmb = file.url.replace('/view/', '/tmb/_tmbsize_/');
	}
	return file.tmb.replace(rootUrl+'/', '');
}
