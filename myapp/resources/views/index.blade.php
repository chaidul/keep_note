<!DOCTYPE html>
<html lang="en">
  <head>
    <title>To-Do List || A day in life</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('css/global.css')}}" />
    <link rel="stylesheet" href="{{asset('css/layout.css')}}" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <body>
    <main>
      <div class="section item1">
        <nav id="navbar">
          <div>
            <i class="fa fa-bars"></i>
            &nbsp;&nbsp;
            <span
              style="
                font-size: 20px;
                font-weight: bold;
                color: rgb(248, 170, 2);
                user-select: none;
              "
              >Keep Note</span
            >
          </div>
          <div>2</div>
        </nav>
      </div>
      <div class="section item2 hide">
        <div class="sidebar">
          <ul>
            <li>
              <a href=""><i class="fa fa-book"></i>&nbsp;&nbsp; Notes</a>
            </li>
            <li>
              <a href=""><i class="fa fa-user"></i>&nbsp;&nbsp; Contact</a>
            </li>
            <li>
              <a href=""><i class="fa fa-question"></i>&nbsp;&nbsp; Help</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="section item3" id="notes">
        <div class="form">
          <fieldset style="padding: 10px; border: 1px solid fuchsia">
            <legend style="text-align: center; font-weight: bold">
              Add a Note
            </legend>
            <form id="form">
              <input
                type="text"
                placeholder="Enter Title"
                id="title"
                required
                name="title"
              /><br />
              <textarea
                type="text"
                placeholder="Enter Note"
                id="note"
                required
                name="note"
              ></textarea
              ><br />
              <input type="color" name="color">
              <br/>
              <button type="submit">Add note</button>
            </form>
          </fieldset>
        </div>
        
      </div>
      <div class="section item4">4</div>
    </main>
    <script src="{{asset('js/navbar.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script>
      $(document).ready(function () {
        getNotes();
        
        $("#form").submit(function (e) {
          e.preventDefault();
          var data = $(this).serialize();
          $.post("api/add",data,function(d,s){
            alert("added new Note")
            getNotes()
          })
        });
        function getNotes() {
          $.get("api/getNotes",function(data,status){
            data.forEach(function(value,i){
              $("#notes").append(`<div class="note" style="background:${value.color}">
              <a href="api/delete?id=${value.id}" style="text-align:right;">
              <i style="color:white" class="fa fa-trash"></i>
              </a>
              <h2>${value.title}</h2>
                
                <p>${value.note}</p>
              </div>`)

            })
          })
        }
      });
    </script>
  </body>
</html>
