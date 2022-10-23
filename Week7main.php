<!doctype html>
<html>
    <head>
        <script src="./jquery/jquery-3.6.1.min.js"></script>
    </head>
    <body>
       <p> This is an ajax example</p>         
<form onsubmit="return(insertFirst())">
            Firstname: <input type="text" id="firstin"><br>
            Lastname: <input type="text" id="lastin"><br>
            Telephone: <input type="text" id="telein"><br>            
            <input type="submit" value ="Submit">
</form>         
<div id=Showuser></div>
    <script>
            function insertFirst() {
                first = $("#firstin").val();
                last = $("#lastin").val();
                tele = $("#telein").val();

                $.get("./Week7Ajax.php",{"cmd": "create", "first" : first, "last": last, "tele" : tele}, function(data) {
                    $("#Showuser").html(data);
                });
                return(false);
            }
            function delName(id) {
                $.get("./Week7Ajax.php",{"cmd": "delete", "id" : id}, function(data) {
                    $("#Showuser").html(data);
                });
                return(false);
            }
            function showuser() {
                $.get("./Week7Ajax.php",{"cmd": ""}, function(data) {
                    $("#Showuser").html(data);
                });
                return(false);
            }
            showuser();
         
        </script>
    <body>
</html>