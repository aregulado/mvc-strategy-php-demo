$(function() {
    // ajax call on form submit
    $("#sortButton").click(function(){
        // validate input
        if( $("#sortingMethod").val() == 0) {
            $("#sortOutput").text('Please choose sorting method');
        } else if($("#sortInput").val() == '') {
            $("#sortOutput").text('Please input a string');
        } else {
            $.ajax({
                url: window.location.origin + '/sort/' + $("#sortingMethod").val() + '/' + $("#sortInput").val(), 
                success: function(result){
                    $("#sortOutput").text(result);
                }
            });
        }
        
    });

    // do not allow special characters or numbers
    $('#sortInput').bind('keyup blur',function(){ 
        var node = $(this);
        node.val(node.val().replace(/[^a-z]/g,'') ); }
    );
});