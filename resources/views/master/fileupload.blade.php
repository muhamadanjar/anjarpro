<input id="images" name="images[]" type="file" multiple>
<input id="userid" name="userid" type="hidden">
<input id="username" name="username" type="text">


<script>
$(document).on("ready", function() {
    $("#images").fileinput({
        uploadAsync: false,
        uploadUrl: "/path/to/upload.php" // your upload server url
        uploadExtraData: function() {
            return {
                userid: $("#userid").val(),
                username: $("#username").val()
            };
        }
    });
});
</script>