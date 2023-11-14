$("#view-profile-button").click(function(){
    $.ajax({
        url: '/api/profile',
        type: 'POST',
        beforeSend: function(xhr) {
          xhr.setRequestHeader('X-Profile-Id', 5);
        },
        success: function(response) {
          $("#response").html("<pre>" + JSON.stringify(response) + "</pre>");
        },
        error: function(error) {
          console.error(error);
        }
    });
});
