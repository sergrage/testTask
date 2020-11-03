require('./bootstrap');
global.jquery = global.jQuery = global.$ = require('jquery');


$('#addComment').click(function(event){
	event.preventDefault();
	let commentTitle = $('#commentTitle').val();
	let commentBody = $('#commentBody').val();
	let commentId = $('#commentId').val();
    $.ajax({
        url: "/articles/newComment",
        type: "POST",
        data:{
        	"commentTitle":  commentTitle,
        	"commentBody":  commentBody,
        	"commentId":  commentId
		},
		headers:{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
        success: function(data)
        {	
        	console.log(data.error)
            if($.isEmptyObject(data.error)){
                $('.addComment').html(data);
            }else{
                printErrorMsg(data.error);
            }
        	console.log(data);
            // $('.addComment').html(data);
            // $('#uploaded_image').html(data);
        },
        error: function(){
        	alert('Что-то пошло не так');
        }
    });
});

function printErrorMsg (msg) {
	console.log(1234567);
    $.each( msg, function( key, value ) {
    console.log(key);
      $('.'+key+'_err').text(value);
    });
}

$('#likesNumber').click(function(e){
	let commentId = $('#commentId').val();
    $.ajax({
    url: "/articles/addLike",
    type: "POST",
    data:{
    	"commentId":  commentId
	},
	headers:{
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	},
    success: function(data)
    {	
        $('#likesNumber').html(data);
    },
    error: function(){
    	alert('Что-то пошло не так');
    }
});

});