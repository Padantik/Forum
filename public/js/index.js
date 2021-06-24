$(() => {
    $(window).on("load", () => {
        console.log("Loaded")
    })


    $("#body").on("keydown", () => {
        let characterCount = $("#body").val().length
        $("#remainingCharacters").html(`${250 - characterCount} remaining`)
    })

    

    $('#body').on("keypress", key => {
        if(key.keyCode == 13) {
            //key.preventDefault()
        }
    })

})