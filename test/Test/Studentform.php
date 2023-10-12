

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- <script src="jquery-latest.js"></script> -->
        <!-- Remember to include jQuery :) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

        <!-- jQuery Modal -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
        <title>Student Form</title>
        <style>
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }

        input[type=radio]{
            /* width: 0%; */
            margin: 8px 0;
            padding: 14px 20px;
        }

        input[type=text]{
            width: 50%;
            margin: 8px 0;
            padding: 14px 20px;
        }

        input[type=email]{
            width: 50%;
            margin: 8px 0;
            padding: 14px 20px;
        }

        input[type=button]{
            width: 50%;
            margin: 8px 0;
            padding: 14px 20px;
        }

        #fnameerror,#addresserror,#phoneerror,#lnameerror,#emailerror{
            display: block;
            color: red;
            margin: 5px 0 0 0;
        }

        img {
                width:100%;
                height:100%;
        }

        .button {
            /* background-color: #4CAF50; */
            border: none;
            color: white;
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
        
        #colorchange {
        height: 50px;
        width: 100%;
        border: 1px solid #4CAF50;
        }

        </style>
        <script>

            $(document).ready(function(){

            // count = 0;


            // function changecolor() {
            //     if (count == 3) {
            //         // Unset background color
            //         var rand = "white";
            //         $('#colorchange').css('background', rand);
            //         return;
            //     }
            //     var back = ["red", "green", "blue"];
            //     var rand = back[count];
            //     $('#colorchange').css('background', rand);
            //     count++;
            //     window.setTimeout(changecolor, 1000);
            // }

            // changecolor();


            function update() {
                $.ajax({
                type: 'POST',
                url: 'datetime.php',
                timeout: 1000,
                success: function(data) {
                    $("#timer").html(data); 
                    window.setTimeout(update, 1000);
                }
                });
            }
            update();
            
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


            $("#submitbutton").click(function(ev) { 

            //validation
            firstname     = $("#first_name").val();
            lastname      = $("#last_name").val();
            address       = $("#address").val();
            phone_no      = $("#phone_no").val();
            email         = $("#email").val();

            //check variable
            check         = 0;

            $("#enterform").text("");
            $("#fnameerror").text("");
            $("#lnameerror").text("");
            $("#addresserror").text("");
            $("#phoneerror").text("");
            $("#emailerror").text("");



            // document.getElementById("enterform").textContent = "";
            // document.getElementById("fnameerror").textContent = "";
            // document.getElementById("addresserror").textContent = "";
            // document.getElementById("phoneerror").textContent = "";

            

            // firstname = document.getElementById("first_name").value;
            // lastname = document.getElementById("last_name").value;
            // // gender = document.querySelector('input[name="gender"]:checked').value;
            // address = document.getElementById("address").value;
            // phone_no = document.getElementById("phone_no").value;
            // email = document.getElementById("email").value;


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
            if(firstname == "" || lastname == "" || address == "" || phone_no == "" || email == "" ){
                check = 1;
                $("#enterform").text("enter all fields");
                // document.getElementById("enterform").textContent = "enter all fields";

            }

            var regname = /^[A-Za-z]+$/;
            var regphone = /^[7-9][0-9]{9}$/;
            var regemail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            //firstname validation
            if(!regname.test(firstname)||firstname.length<3){
                check = 1;
                $("#fnameerror").text("enter firstname properly");
                // document.getElementById("fnameerror").textContent = "enter name properly";

            }

            //secondname validation
            if(!regname.test(lastname)||lastname.length<3){
                check = 1;
                $("#lnameerror").text("enter lastname properly");
                // document.getElementById("fnameerror").textContent = "enter name properly";

            }

            //address validation
            if(address.length>100){
                check = 1;
                $("#addresserror").text("reduce address field");
                // document.getElementById("addresserror").textContent = "reduce address field";

            }

            //phone validation
            if(!regphone.test(phone_no)){
                check = 1;
                $("#phoneerror").text("enter phone number properly");
                // document.getElementById("phoneerror").textContent = "enter phone number properly";

            }

            //email validation
            if(!regemail.test(email)){
                check = 1;
                $("#emailerror").text("enter email properly");
                // document.getElementById("phoneerror").textContent = "enter phone number properly";

            }


            if(check == 1){
                return false;
            }


            //form submission
            
            var form = $("#myForm"); 
            var url = form.attr('action'); 
            $.ajax({ 
                type: "POST", 
                url: url, 
                data: form.serialize(), 
                success: function(data) { 
                      
                    // Ajax call completed successfully 
                    alert("Form Submited Successfully"); 
                    $('form :input').val('');

                }, 
                error: function(data) { 
                      
                    // Some error in ajax call 
                    alert("some Error"); 
                } 
            }); 
            }); 


            });

            // function validation(){

            //     firstname     = $("#first_name").val();
            //     lastname      = $("#last_name").val();
            //     address       = $("#address").val();
            //     phone_no       = $("#phone_no").val();
            //     email         = $("#email").val();

            //     //check variable
            //     check         = 0;

            //     $("#enterform").text("");
            //     $("#fnameerror").text("");
            //     $("#lnameerror").text("");
            //     $("#addresserror").text("");
            //     $("#phoneerror").text("");
            //     $("#emailerror").text("");



            //     // document.getElementById("enterform").textContent = "";
            //     // document.getElementById("fnameerror").textContent = "";
            //     // document.getElementById("addresserror").textContent = "";
            //     // document.getElementById("phoneerror").textContent = "";

                

            //     // firstname = document.getElementById("first_name").value;
            //     // lastname = document.getElementById("last_name").value;
            //     // // gender = document.querySelector('input[name="gender"]:checked').value;
            //     // address = document.getElementById("address").value;
            //     // phone_no = document.getElementById("phone_no").value;
            //     // email = document.getElementById("email").value;



            //     if(firstname == "" || lastname == "" || address == "" || phone_no == "" || email == "" ){
            //         check = 1;
            //         $("#enterform").text("enter all fields");
            //         // document.getElementById("enterform").textContent = "enter all fields";

            //     }

            //     var regname = /^[A-Za-z]+$/;
            //     var regphone = /^[7-9][0-9]{9}$/;
            //     var regemail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            //     //firstname validation
            //     if(!regname.test(firstname)||firstname.length<3){
            //         check = 1;
            //         $("#fnameerror").text("enter firstname properly");
            //         // document.getElementById("fnameerror").textContent = "enter name properly";

            //     }

            //     //secondname validation
            //     if(!regname.test(lastname)||lastname.length<3){
            //         check = 1;
            //         $("#lnameerror").text("enter lastname properly");
            //         // document.getElementById("fnameerror").textContent = "enter name properly";

            //     }

            //     //address validation
            //     if(address.length>100){
            //         check = 1;
            //         $("#addresserror").text("reduce address field");
            //         // document.getElementById("addresserror").textContent = "reduce address field";

            //     }

            //     //phone validation
            //     if(!regphone.test(phone_no)){
            //         check = 1;
            //         $("#phoneerror").text("enter phone number properly");
            //         // document.getElementById("phoneerror").textContent = "enter phone number properly";

            //     }

            //     //email validation
            //     if(!regemail.test(email)){
            //         check = 1;
            //         $("#emailerror").text("enter email properly");
            //         // document.getElementById("phoneerror").textContent = "enter phone number properly";

            //     }


            //     if(check == 1){
            //         return false;
            //     }

                

            //     //submit form
            //     // document.getElementById("myForm").submit();


            //     $("#myForm").submit(function(){
            //         alert("Submitted");
            //     });

            // }


        </script>
    </head>
    <body>
        <h1>Student Form</h1>
        <div id="timer"></div>

        <!-- <div id="colorchange">Color change</div>

        <div>
            <input type="button" onclick="changecolor()">Color change</input>
        </div> -->

        <div id="enterform"></div>
        <form id="myForm" method="post" action="test.php">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="firstname" required>
            <span id="fnameerror"></span>
            <br>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="lastname" required>
            <span id="lnameerror"></span>
            <br>

            <label for="gender">Gender</label>
            <input type="radio" id="male" name="gender" value="male" required>
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female" required>
            <label for="female">Female</label>
            <br>

            <label for="address">Address</label>
            <input type="text" id="address" name="address" required>
            <span id="addresserror"></span>
            <br>

            <label for="phone_no">Phone</label>
            <input type="text" id="phone_no" name="phone_no" required>
            <span id="phoneerror"></span>
            <br>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <span id="emailerror"></span>
            <br>

            <input type="button" id="submitbutton" value="Submit Form">

            <!-- <input type="button" id="submitbutton" onclick="validation()" value="Submit Form"> -->

        </form>
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

        <!-- <p><a href="#ex1" rel="modal:open"><button>Open modal</button></a></p> -->
    </body>
</html>