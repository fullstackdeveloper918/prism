jQuery(document).ready(function($) {

	$(document).on('submit','[data-pafe-form-google-sheets-connector] form',function(){
        var $wrapper = $(this).closest('[data-pafe-form-google-sheets-connector]'),
        	fieldsOj = [];

		$(this).find('[name^="form_fields"]').each(function(){
			var fieldType = $(this).attr('type'),
				fieldName = $(this).attr('name');

			if (fieldName.indexOf('[]') !== -1) {
                var fieldValueMultiple = [];

                if (fieldType == 'checkbox') {
                    $(document).find('[name="'+ fieldName + '"]:checked').each(function () {
                        fieldValueMultiple.push($(this).val());
                    });
                } else {
                    fieldValueMultiple = $(this).val();
                    if (fieldValueMultiple == null) {
                        var fieldValueMultiple = [];
                    }
                }

                fieldValue = '';

                for (var j = 0; j < fieldValueMultiple.length; j++) {
                	fieldValue += fieldValueMultiple[j];
                	if (j != fieldValueMultiple.length - 1) {
                		fieldValue += ',';
                	}
                }
			} else {
				if (fieldType == 'radio' || fieldType == 'checkbox') {
                    var fieldValue = $(document).find('[name="'+ fieldName +'"]:checked').val();
                } else {
                    var fieldValue = $(this).val().trim();
                }
			}
			
			if (fieldValue != undefined) {
				var fieldItem = {};
				fieldItem['name'] = fieldName.replace('[]','').replace('form_fields[','').replace(']','');
				fieldItem['value'] = fieldValue;
				fieldsOj.push(fieldItem);
			}
		});

		var row = '',
			fieldList = $wrapper.data('pafe-form-google-sheets-connector-field-list'),
			columnArray = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

		for (var z = 0; z < columnArray.length; z++) {
			var value = '';

		 	for (var i = 0; i < fieldList.length; i++) {
	            var fieldID = fieldList[i]['pafe_form_google_sheets_connector_field_id'],
	            	fieldColumn = fieldList[i]['pafe_form_google_sheets_connector_field_column'];

            	if (columnArray[z] == fieldColumn) {
            		for(var j=0; j < fieldsOj.length; ++j) {
            			if (fieldsOj[j].name == fieldID) {
            				value = fieldsOj[j].value;
            			}
	        		}
            	}  
	        }

	        row += '"'+value+'",';
        }
	   
	    // Submission
	    row = row.slice(0, -1);
	    // Config
	    var gs_sid = $wrapper.data('pafe-form-google-sheets-connector'); // Enter your Google Sheet ID here
	    var gs_clid = $wrapper.data('pafe-form-google-sheets-connector-clid');; // Enter your API Client ID here
	    var gs_clis = $wrapper.data('pafe-form-google-sheets-connector-clis');; // Enter your API Client Secret here
	    var gs_rtok = $wrapper.data('pafe-form-google-sheets-connector-rtok');; // Enter your OAuth Refresh Token here
	    var gs_atok = false;
	    var gs_url = 'https://sheets.googleapis.com/v4/spreadsheets/'+gs_sid+'/values/A1:append?includeValuesInResponse=false&insertDataOption=INSERT_ROWS&responseDateTimeRenderOption=SERIAL_NUMBER&responseValueRenderOption=FORMATTED_VALUE&valueInputOption=USER_ENTERED';
	    var gs_body = '{"majorDimension":"ROWS", "values":[['+row+']]}';

	    // HTTP Request Token Refresh
	    var xhr = new XMLHttpRequest();
	    xhr.open('POST', 'https://www.googleapis.com/oauth2/v4/token?client_id='+gs_clid+'&client_secret='+gs_clis+'&refresh_token='+gs_rtok+'&grant_type=refresh_token');
	    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	    xhr.onload = function() {           
	        var response = JSON.parse(xhr.responseText);
	        var gs_atok = response.access_token;            
			// HTTP Request Append Data
	        if(gs_atok) {
	            var xxhr = new XMLHttpRequest();
	            xxhr.open('POST', gs_url);
	            xxhr.setRequestHeader('Content-length', gs_body.length);
	            xxhr.setRequestHeader('Content-type', 'application/json');
	            xxhr.setRequestHeader('Authorization', 'OAuth ' + gs_atok );
	            xxhr.send(gs_body);
	        }            
	    };
	    xhr.send();
    });

});