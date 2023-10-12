<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- <script src="jquery-latest.js"></script> -->
        <!-- Remember to include jQuery :) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

        <!-- jQuery Modal -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
        <title>Color Change</title>
        <style>
            #colorchange {
            height: 50px;
            width: 100%;
            border: 1px solid #4CAF50;
            }
        </style>
        <script>
            count = 0;

            function changecolor() {
                if (count == 3) {
                    // Unset background color
                    var rand = "white";
                    $('#colorchange').css('background', rand);
                    return;
                }
                var back = ["red", "green", "blue"];
                var rand = back[count];
                $('#colorchange').css('background', rand);
                count++;
                window.setTimeout(changecolor, 1000);
            }
        </script>
    </head>
    <body>
        <div id="colorchange">Color change</div>
        <div>
            <button onclick="changecolor()">Color change</button>
        </div>
    </body>
</html>