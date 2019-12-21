jQuery(document).ready(function() {
    if ( document.getElementById('jsMap')) {
        jQuery('#jsMap').select2( {
            placeholder: 'Select an option'
        });
        // Input select for cities
        var $eventSelect = $("#jsMap");
        var baseurl = document.getElementById('moduleURL').value;
        //console.log(baseurl);
        // active event for select2
        $eventSelect.on("select2:select", function (e) { 
        	//console.log('Hello fanny start event select');
        	//console.log(e.params.data.id);
        	
        	$.ajax({
        		type: 'GET',
        		url: baseurl,
        		data: { data: e.params.data.id},
        		dataType: "json",
        		success: function(data, e,response) {
        			//console.log(data);
        			if ( e === "success") {
        				$('#result-data').html( data[0] );
        			}
        		}
        	});
        	e.preventDefault();
        	return false;
        });
        $eventSelect.on('keyup', function(e) {
        	//console.log('Hello fanny start event select');
        	//console.log(e.params.data.id);
        	
        	$.ajax({
        		type: 'GET',
        		url: baseurl,
        		data: { data: e.params.data.id},
        		dataType: "json",
        		success: function(data, e,response) {
        			//console.log(data);
        			if ( e === "success") {
        				$('#result-data').html( data[0] );
        			}
        		}
        	});
        	e.preventDefault();
        	return false;
        });
    }
    
});


jQuery( document ).ajaxComplete(function() {
    
	jQuery('#result-data').find('.margin-d a').click(function(){ 
		var latitude = $(this).data('lat');
		var longitude = $(this).data('lng');

		var point = new google.maps.LatLng(
            parseFloat(latitude),
            parseFloat(longitude)
            );
            
        var marker = new google.maps.Marker({
            map: map,
            position: point
        });
        getDataById( $(this).attr('id'), map, marker );
		
	});
	
});

var getDataById = function (id, map, marker) {
    var baseurl = document.getElementById('moduleURL').value;
	//console.log(id);
	var l;
	$.ajax({
		type: 'POST',
		url: baseurl,
		dataType: 'json',
		data: {
			datos: id
		},
		success: function( resp){
		
			popupInfo = resp['resuesta'][0];
	        var infowincontent = document.createElement('div');
	        var strong = document.createElement('strong');
	        strong.textContent = popupInfo['name']
	        infowincontent.appendChild(strong);
	        infowincontent.appendChild(document.createElement('br'));
	
	        var text = document.createElement('text');
	        text.textContent = "Departamento: " + popupInfo['name_state']
	        infowincontent.appendChild(text);
	        infowincontent.appendChild(document.createElement('br'));
	
	        var text = document.createElement('text');
	        text.textContent = "Ciudad: " + popupInfo['city']
	        infowincontent.appendChild(text);
	        infowincontent.appendChild(document.createElement('br'));
	
	        var text = document.createElement('text');
	        text.textContent = "Dirección: " + popupInfo['address1']
	        infowincontent.appendChild(text);
	        infowincontent.appendChild(document.createElement('br'));
	        
	        map.setZoom(map.getZoom() + 3);  
	        map.setCenter(marker.getPosition());
	        
	        infoWindow.setContent(infowincontent);
	        infoWindow.open(map, marker);			
		}
	});
}

$(document).ready(function(){
    if ( document.getElementById('jsMap') ) {
    	var baseurl = document.getElementById('moduleURL').value;
    	var elementoInicio = $("#jsMap").select2().val();
    	$.ajax({
    		type: 'GET',
    		url: baseurl,
    		data: { data: elementoInicio},
    		dataType: "json",
    		success: function(data, e,response) {
    			//console.log();
    			if ( e === "success") {
    				$('#result-data').html( data[0] );
    				$('#idejemplo').animate({scrollTop:300}, 'slow');
    			}
    		}
    	});
    }
});
