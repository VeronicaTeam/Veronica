function Autenticazione(Message){
	var pass = "Chiave_fissa_provvisoria";			// In una seconda fase si utilizzerà un protocollo per chiavi.
	var hash = CryptoJS.HmacSHA256(Message, pass);

	return hash;
}

