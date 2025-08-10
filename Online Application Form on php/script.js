$(document).ready(function() {
    $("#applicationForm").submit(function(event) {
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "process.php",
            data: formData,
            success: function(response) {
                $("#result").html(response);
            }
        });
    });
});