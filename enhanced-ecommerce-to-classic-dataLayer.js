dataLayer.push({
	'event':'classicTransactionComplete',
	'transactionId': {{ecommerce.purchase.actionField.id}},
	'transactionAffiliation': {{ecommerce.purchase.actionField.affiliation}},
	'transactionTotal': {{ecommerce.purchase.actionField.revenue}},
	'transactionTax': {{ecommerce.purchase.actionField.tax}},
	'transactionShipping': {{ecommerce.purchase.actionField.shipping}},
	'transactionProducts': {{ecommerce.purchase.actionField.products}}
});
