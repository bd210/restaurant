$(document).ready(function(){

	// Prikaz postova iz baze pri ucitavanju stranice
	
	$.ajax({
		type: 'GET',
		url: baseUrl + '/ajax/posts',
		success: function(data, xhr){
			console.log(data);
			console.log(xhr);
			showPosts(data);
			
		} , 
		error: function(xhr, status, error){
			console.log(xhr);
			console.log(status);
			console.log(error);
		}

	});

	$('#btnSearch').click(function(){
		var uneto = $('input[name="search"]').val();

		$.ajax({
			type: 'POST',
			url: baseUrl + '/ajax/posts/search',
			data: {unos: uneto, _token: token} ,
			success: function(data, xhr){
				console.log(data);
				console.log(xhr);
				showPosts(data);
				
			} , 
			error: function(xhr, status, error){
				console.log(xhr);
				console.log(status);
				console.log(error);
			}

		});
	});

	/* $('input[name="search"]').keyup(function(){
		var uneto = $(this).val();

		$.ajax({
			type: 'GET',
			url: baseUrl + '/ajax/posts/search',
			data: {unos: uneto} ,
			success: function(data, xhr){
				console.log(data);
				console.log(xhr);
				showPosts(data);
				
			} , 
			error: function(xhr, status, error){
				console.log(xhr);
				console.log(status);
				console.log(error);
			}

		});

	}); */
	

	$('body').on('click', '.showPost', function(){
		var id = $(this).data('id');

		$.ajax({
			type: 'GET',
			url: baseUrl + '/ajax/posts/' + id,
			success: function(data, xhr){
				console.log(data);
				console.log(xhr);
				$('#postovi').html(data);
			},
			error: function(xhr, status, error){
				console.log(xhr);
				console.log(status);
				console.log(error);
			}
		});
	});
});


function showPosts(data){
	var postsHtml = "";
	$.each(data, function(key, value){
		postsHtml +='<div class="card mb-4">' +
        '<img class="card-img-top" src="' + baseUrl +'/'+ value.putanja + '" alt="Card image cap">' +
        '<div class="card-body">' +
          '<h2 class="card-title">' + value.naslov +'</h2>' +
          '<p class="card-text">' +
            value.sadrzaj +
          '</p>' +
          '<a href="#" class="btn btn-primary showPost" data-id="' + value.postId +'">Read More &rarr;</a>' + 
        '</div>' + 
        '<div class="card-footer text-muted">' +
          'Posted on ' + timestampToDate(value.created_at) + ' by' +
          '<a href="#">' + value.korisnicko_ime + '</a>' +
        '</div>' +
      '</div>';
	});

	$('#postovi').html(postsHtml);
}

function timestampToDate(timestamp){
	var date = new Date(timestamp*1000);
	
	var day = date.getDate();
	var month = date.getMonth();
	var year = date.getFullYear();

	var hours = date.getHours();
	var minutes = date.getMinutes();
	return day + "." + month + "." + year + " " + hours + ":" + minutes;
}