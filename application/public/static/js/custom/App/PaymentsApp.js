function makePayment (payment_id) {
	var car_plate_val = $.trim($('car_plate').val());
	var amount_val = $.trim($('amount').val());

	if (car_plate_val == '') {
		alert('Enter your car\'s number plate.');
		$('car_plate').focus(); return false;
	};
	if (amount_val == '') {
		alert('No toll amount specified.');
		$('amount').focus(); return false;
	};

	if (car_plate_val != '' && amount_val != '') {
		val form_data = new FormData();
		const url = 'http://localhost/Ug_road_toll/application/protected/private/APIs/v1/dbPaymentsAPI.php';

		form_data.append('payment_id', payment_id);
		form_data.append('car_plate', car_plate_val);
		form_data.append('bar_code', bar_code_val);
		form_data.append('qr_code', qr_code_val);
		form_data.append('date_payed', date_payed_val);
		form_data.append('duration', duration_val);
		form_data.append('validity', validity_val);

		var xhr = new XMLHttpRequest();
		xhr.onabort = function onAbort () {console.log('abort')};
		xhr.onerror = function onError () {console.log('error')};
		xhr.open('POST', url, true);
		xhr.onload = function(){
			// Do something on load.
		};

		xhr.send(form_data);
	} else{};
}

function showPaymentById(payment_id_val) {
	const url = 'http://localhost/Ug_road_toll/application/protected/private/APIs/v1/dbPaymentsAPI.php';

	if (payment_id_val != '') {
		var form_data = new FormData();
		form_data.append('payment_id', payment_id_val);

		var xhr = XML.XMLHttpRequest();
		xhr.onreadystatechange = function(){
			if (xhr.readyState == 4 && xhr.status == 200) {
				var dictionary = JSON.parse(xhr.responseText);
				if (dictionary) {
					for (item in dictionary) {
						for (value in dictionary[item]) {
							var paymentID = dictionary[item][value].payment_id;
							var userID = dictionary[item][value].user_id;
							var carPlate = dictionary[item][value].car_plate;
							var amount = dictionary[item][value].amount;
							var barCode = dictionary[item][value].bar_code;
							var qrCode =dictionary[item][value].qr_code;
							var datePayed =dictionary[item][value].date_payed;
							var duration =dictionary[item][value].duration;
							var validity =dictionary[item][value].validity;

							if (typeof dictionary[item][value].payment_id !== 'undefined') {
								var showPaymentUI = '';
							}
						}
					}
                   $('').show();
                   $('').hide();
                   $('').html(showPaymentUI);
				}
			}
		};
		xmlhttp.open('POST', url, true);
		xmlhttp.send(form_data);
	}
}

function showPayments () {
	var form_data = new FormData();
	const url = 'http://localhost/Ug_road_toll/application/protected/private/APIs/v1/dbPaymentsAPI.php';

	var xhr = XML.XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if (xhr.readyState == 4 && xhr.status == 200) {
			var dictionary = JSON.parse(xhr.responseText);
			if (dictionary) {
				var showPaymentDetailsUI = '';
				var paymentTableHeaderUI = '<table>'
					+'<thead>'
						+'<tr>'
							+'<td>Payment ID</td>'
							+'<td>Car No. Plate</td>'
							+'<td>Amount Payed</td>'
							+'<td>Bar Code</td>'
							+'<td>QR Code</td>'
							+'<td>Payed On</td>'
							+'<td>Duration</td>'
							+'<td>Valid</td>'
						+'</tr>'
					+'</thead>';
				for (item in dictionary) {
					for (value in dictionary[item]) {
							var paymentID = dictionary[item][value].payment_id;
							var userID = dictionary[item][value].user_id;
							var carPlate = dictionary[item][value].car_plate;
							var amount = dictionary[item][value].amount;
							var barCode = dictionary[item][value].bar_code;
							var qrCode =dictionary[item][value].qr_code;
							var datePayed =dictionary[item][value].date_payed;
							var duration =dictionary[item][value].duration;
							var validity =dictionary[item][value].validity;

						if (typeof dictionary[item][value].payment_id !== 'undefined') {
							var showPaymentDetailsUI = '<tr onclick="showPaymentById(paymentID)">'
								+'<td>'+paymentID+'</td>'
								+'<td>'+carPlate+'</td>'
								+'<td>'+amounts+'</td>'
								+'<td>'+barCode+'</td>'
								+'<td>'+qrCode+'</td>'
								+'<td>'+datePayed+'</td>'
								+'<td>'+duration+'</td>'
								+'<td>'+validity+'</td>'
							+'</tr>';
						}
					}
				}
				var paymentTableFooterUI = '</table>';
				var showPaymentUI = paymentTableHeaderUI + showPaymentDetailsUI + paymentTableFooterUI;
                $('').show();
                $('').hide();
                $('').html(showPaymentUI);
			}
		}
	};
	xmlhttp.open('POST', url, true);
	xmlhttp.send(form_data);
}