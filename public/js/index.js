$(() => {
    $(window).on("load", () => {
        console.log("Loaded")
    })



    $('.body').on("keydown", key => {
        if(key.which == 13) {
            if($.trim($("#body").val()) != "") {
                key.preventDefault()
                $("#comment-form").submit();
            }
        }
    })
    
    $("textarea").on("keypress", function(e) {
        while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
            $(this).height($(this).height()+1);
        };
    });

})