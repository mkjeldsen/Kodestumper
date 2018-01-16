/**
	* Peform a Network Service Lookup, using DK-Hostmaster API.
	*
	* @param {"google.com"} dn    A well-formed domain name to resolve.
	* @param {"A"} type           Type of data to be returned, such as A, AAA, MX, NS...
	* @return {String}            Domain availability status
	* @customfunction
*/
function NSLookup(dn,type) {
	var url = "https://whois-api.dk-hostmaster.dk/domain/" + dn;
	var headers = {
		'Accept':'application/json'
	};
	var options = {
		'method': 'get',
		'headers': headers,
		'muteHttpExceptions': true
	};
	var result = UrlFetchApp.fetch(url,options);
	var rc = result.getResponseCode();
	var response = result.getContentText();
	if (rc !== 200) {
		//  @todo: find grunden til at den "vender forkert"
		return "frit";
	} else {
		return "optaget";
	}
}
