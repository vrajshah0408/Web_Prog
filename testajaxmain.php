<!doctype html>
<html>
    <head>
        <script src="./jQuery/jquery-3.6.1.min.js"></script>
    </head>
    <body>
    <p>This is an ajax example.</p> 

    <form onsubmit="return(insertPeople())">
        Firstname: <input type=text id=personfirstname><br>
        Lastname: <input type=text id=personlastname><br>
        Telephone: <input type=text id=persontelephone><br> 
        <input type=submit value=Submit>
    </form>

    <div id=showpeople></div> 
    <script>
    function insertPeople() {
        firstn = $("#personfirstname").val();
        lastn = $("#personlastname").val();
        phone = $("#persontelephone").val();

                $.get("./week7ajax.php",{"cmd": "create", "firstn" : firstn, "lastn" : lastn, "phone" : phone}, function(data) {
                    $("#showpeople").html(data);
                });
                return(false);
            }
            function deletePeople(id) {
                $.get("./week7ajax.php",{"cmd": "delete", "id" : id}, function(data) {
                    $("#showpeople").html(data);
                });
                return(false);
            }
    function showPeople() {
                $.get("./week7ajax.php",{"cmd": ""}, function(data) {
                    $("#showpeople").html(data);
                });
                return(false);
            }
        showPeople();
    </script> 
    </body>
</html>