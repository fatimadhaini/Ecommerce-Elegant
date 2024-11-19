<html>
  <head>
  </head>
  <style>
    *{
      font-family: Arial, sans-serif;
    }
    form{
      margin: 15px 5px;
      width: 500px;
      font-size: 16px;
    }
    form h1{
      text-align: center;
    }
    form label{
      display: block;
      margin-bottom: 5px;
    }
    form input, form textarea{
      width: 100%;
      padding: 5px;
      margin-bottom: 10px;
      box-sizing: border-box;
      resize: vertical;
    }
    form button{
      background: #4CAF50;
      color: white;
      padding: 10px 15px;
      margin-top: 5px;
      border: none;
      cursor: pointer;
    }
    form button:hover{
      background: green;
    }
  </style>
  <body>
    <form>
      <h1>Send Data To WhatsApp</h1>
      <label for="">Name</label>
      <input type="text" class="name">

      <label for="">Email</label>
      <input type="text" class="email">

      <label for="">Country</label>
      <input type="text" class="country">

      <label for="">Message</label>
      <textarea class="message"></textarea>
      <button type="button" onclick="sendwhatsapp();">Send Via WhatsApp</button>
    </form>

    <script>
      function sendwhatsapp(){
       var phonenumber = "+96170074639";

       var name = document.querySelector(".name").value;
       var email = document.querySelector(".email").value;
       var country = document.querySelector(".country").value;
       var message = document.querySelector(".message").value;

       var url = "https://wa.me/" + phonenumber + "?text="
       +"*Name :* "+name+"%0a"
       +"*Email :* "+email+"%0a"
       +"*Country:* "+country+"%0a"
       +"*Message :* "+message
       +"%0a%0a"
       +"This is an example of send HTML form data to WhatsApp";

       window.open(url, '_blank').focus();
     }
    </script>
  </body>
</html>