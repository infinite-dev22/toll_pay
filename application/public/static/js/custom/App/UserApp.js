// var  = $.trim($('').val());

function addUser () {
	var user_fname_val = $.trim($('first_name').val());
	var user_fname_val = $.trim($('last_name').val());
	var email_address_val = $.trim($('email_address').val());
	var telephone_val = $.trim($('telephone').val());
	var pass_val = $.trim($('password').val());

	if (user_fname_val == '') {
		alert('Enter first name.');
		$('first_name').focus(); return false;
	};
	if (user_lname_val == '') {
		alert('Enter last name.');
		$('last_name').focus(); return false;
	};
	if (email_address_val == '') {
		alert('Enter email address.');
		$('email_address').focus(); return false;
	};
	if (telephone_val == '') {
		alert('Enter telephone.');
		$('telephone').focus(); return false;
	};
	if (pass_val == '') {
		alert('Enter telephone.');
		$('password').focus(); return false;
	};

	if (user_fname_val != '' && user_lname_val != '' && email_address_val != '' && telephone_val != '' && pass_val != '') {
		val form_data = new FormData();
		const url = 'http://localhost/Ug_road_toll/application/protected/private/APIs/v1/dbUserAPI.php?api_call=signup';

		form_data.append('user_fname', user_fname_val);
		form_data.append('user_lname', user_lname_val);
		form_data.append('email_address', email_address_val);
		form_data.append('telephone', telephone_val);
		form_data.append('password', pass_val);

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

function showUserById(user_id_val) {
	const url = 'http://localhost/Ug_road_toll/application/protected/private/APIs/v1/dbUserAPI.php?api_call=fetchuserdetails';

	if (user_id_val != '') {
		var form_data = new FormData();
		form_data.append('user_id', user_id_val);

		var xhr = XML.XMLHttpRequest();
		xhr.onreadystatechange = function(){
			if (xhr.readyState == 4 && xhr.status == 200) {
				var dictionary = JSON.parse(xhr.responseText);
				if (dictionary) {
					for (item in dictionary) {
						for (value in dictionary[item]) {
							var userID = dictionary[item][value].user_id;
							var userFName = dictionary[item][value].user_fname;
							var userLName = dictionary[item][value].user_lname;
							var emailAddress = dictionary[item][value].email_address;
							var telephone =dictionary[item][value].telephone;

							if (typeof dictionary[item][value].user_id !== 'undefined') {
								var showUserUI = '';
							}
						}
					}
                   $('').show();
                   $('').hide();
                   $('').html(showUserUI);
				}
			}
		};
		xmlhttp.open('POST', url, true);
		xmlhttp.send(form_data);
	}
}

function logUserIn () {
	var email_address_val = $.trim($('email_address').val());
	var pass_val = $.trim($('password').val());

	if (email_address_val == '') {
		alert('Enter email address.');
		$('email_address').focus(); return false;
	};
	if (pass_val == '') {
		alert('Enter your password.');
		$('password').focus(); return false;
	};

	if (email_address_val != '' && pass_val != '') {
		val form_data = new FormData();
		const url = 'http://localhost/Ug_road_toll/application/protected/private/APIs/v1/dbUserAPI.php?api_call=signin';

		form_data.append('email_address', email_address_val);
		form_data.append('password', pass_val);

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

function updateUserDetails (user_id, user_fname, user_lname, email_address, telephone, password) {
	var user_id_val = $.trim($('user_id').val());
	var user_fname_val = $.trim($('first_name').val());
	var user_fname_val = $.trim($('last_name').val());
	var email_address_val = $.trim($('email_address').val());
	var telephone_val = $.trim($('telephone').val());
	var pass_val = $.trim($('password').val());

	if (user_fname_val == '') {
		alert('Enter first name.');
		$('first_name').focus(); return false;
	};
	if (user_lname_val == '') {
		alert('Enter last name.');
		$('last_name').focus(); return false;
	};
	if (email_address_val == '') {
		alert('Enter email address.');
		$('email_address').focus(); return false;
	};
	if (telephone_val == '') {
		alert('Enter telephone.');
		$('telephone').focus(); return false;
	};
	if (pass_val == '') {
		alert('Enter telephone.');
		$('password').focus(); return false;
	};

	if (user_id_val != '' && user_fname_val != '' && user_lname_val != '' && email_address_val != '' && telephone_val != '' && pass_val != '') {
		val form_data = new FormData();
		const url = 'http://localhost/Ug_road_toll/application/protected/private/APIs/v1/dbUserAPI.php?api_call=updateuserdetails';

		form_data.append('user_id', user_id_val);
		form_data.append('user_fname', user_fname_val);
		form_data.append('user_lname', user_lname_val);
		form_data.append('email_address', email_address_val);
		form_data.append('telephone', telephone_val);
		form_data.append('password', pass_val);

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

function deleteUser (user_id_val) {
	var del_confirm = confirm('Your account will be deleted.\nDo you want to proceed with this?');
	if (del_confirm) {
		const url = 'http://localhost/Ug_road_toll/application/protected/private/APIs/v1/dbUserAPI.php?api_call=deleteuser';

		if (user_id_val != '') {
			var form_data = new FormData();
			form_data.append('user_id', user_id_val);

			var xhr = new XMLHttpRequest();
			xhr.onabort = function onAbort () {console.log('abort')};
			xhr.onerror = function onError () {console.log('error')};
			xhr.open('POST', url, true);
			xhr.onload = function(){
				// Do something on load.
			};

			xhr.send(form_data);
		}
	}
}

function showUsers () {
	var form_data = new FormData();
	const url = 'http://localhost/Ug_road_toll/application/protected/private/APIs/v1/dbUserAPI.php?api_call=showusers';

	var xhr = XML.XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if (xhr.readyState == 4 && xhr.status == 200) {
			var dictionary = JSON.parse(xhr.responseText);
			if (dictionary) {
				var showUserDetailsUI = '';
				var userTableHeaderUI = '<table>'
					+'<thead>'
						+'<tr>'
							+'<td>User ID</td>'
							+'<td>User Name</td>'
							+'<td>e-Mail</td>'
							+'<td>Telephone</td>'
						+'</tr>'
					+'</thead>';
				for (item in dictionary) {
					for (value in dictionary[item]) {
						var userID = dictionary[item][value].user_id;
						var userFName = dictionary[item][value].user_fname;
						var userLName = dictionary[item][value].user_lname;
						var emailAddress = dictionary[item][value].email_address;
						var telephone =dictionary[item][value].telephone;

						if (typeof dictionary[item][value].user_id !== 'undefined') {
							var showUserDetailsUI = '<tr onclick="showUserById(userID)">'
								+'<td>'+userID+'</td>'
								+'<td>'+userFName+' '+userLName+'</td>'
								+'<td>'+emailAddress+'</td>'
								+'<td>'+telephone+'</td>'
							+'</tr>';
						}
					}
				}
				var userTableFooterUI = '</table>';
				var showUserUI = userTableHeaderUI + showUserDetailsUI + userTableFooterUI;
                $('').show();
                $('').hide();
                $('').html(showUserUI);
			}
		}
	};
	xmlhttp.open('POST', url, true);
	xmlhttp.send(form_data);
}