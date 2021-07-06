$(() => {
    $(window).on("load", () => {
        console.log("Loaded")
    })


    $("#body").on("keydown", () => {
        let characterCount = $("#body").val().length
        $("#remainingCharacters").html(`${150 - characterCount}/150`)
    })


    $('#body').on("keypress", key => {
        if(key.which == 13) {
            if($.trim($("#body").val()) != "") {
                key.preventDefault()
                $("#comment-form").submit();
            }
        }
    })

    document.getElementById("post-display").scrollTo(0,document.getElementById("post-display").scrollHeight);



})