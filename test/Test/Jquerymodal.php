<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

        <!-- jQuery Modal -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
        <title>Student Form</title>
        <style>
            input[type=button]{
                width: 50%;
                margin: 8px 0;
                padding: 14px 20px;
            }

            img {
                width:100%;
                height:100%;
            }

            .button {
                /* background-color: #4CAF50; */
                border: none;
                color: black;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }


            .active{
                background-color: blue;
                color: white;
            }


            .modal {
                max-width: 1000px;
            }


            #buttons{
                display: flex;
            }

        </style>

        <script>
            $(document).ready(function(){
                $("#pricedetails").click(function(){
                    $("#modalimg").attr("src","sampleimage1.jpeg");
                    $(this).addClass("active"); 
                    $('#productdetails').removeClass("active"); 
                    $('#modaltitle').html("Price details");
                    $('#content').html("Price details,when price button details is clicked the details of the price are displayed inside this textarea.");
                });
                $("#productdetails").click(function(){
                    $("#modalimg").attr("src","image2.jpg");
                    $(this).addClass("active"); 
                    $('#pricedetails').removeClass("active"); 
                    $('#modaltitle').html("Product details");
                    $('#content').html("Product details,when product button details is clicked the details of the product are displayed inside this textarea.");
                });
            });
        </script>
    </head>
    <body>
        <div id="ex1" class="modal">
            <h1 id="modaltitle">Price Details</h1>

            <div id="imagecontainer">
                <img id="modalimg" src="sampleimage1.jpeg" alt="">
            </div>

            <div id="buttons">
                <input type="button" id="pricedetails" class="button active" value="Price Details">
                <input type="button" id="productdetails" class="button" value="Product Details">
            </div>

            <textarea name="modalcontent" id="content" cols="100" rows="10">
                Price details,when price button details is clicked the details of the price are displayed inside this textarea.
            </textarea>

            <!-- <div id="content">
                Pricedetails
            </div> -->

            <a href="#" rel="modal:close">Close</a>
        </div>

        <h1>Jquery Modal</h1>

        <p><a href="#ex1" rel="modal:open"><button>Open modal</button></a></p>
    </body>
</html>
