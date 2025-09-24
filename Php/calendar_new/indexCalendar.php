<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="../calendar_new/css/calendar.css">
  <link rel="stylesheet" href="../calendar_new/css/theme.css">
  <link rel="stylesheet" href="../calendar_new/css/spinner.css">
  <link rel="stylesheet" href="../calendar_new/css/style.css">
  <link rel="stylesheet" href="../../Css/bg.css">
</head>

<body>
  <div class="container py-0">

    <!-- For Demo Purpose -->
    <header class="text-center text-dark mb-2">
      <h3 class="display-6 text-white">Calendar</h3>
      <!-- <p class="font-italic mb-0">A nicely-designed Bootstrap Calendar widget. This calendar is easy to use. 
      Just call <u>bindData(mockData)</u> and <u>render()</u>. Then assign <u>onDateClick</u> 
      and <u>onEventClick()</u> handlers. Note that <u>time</u> value is acting as an ID and a sorter, so it is essential.</p>
      <p class="font-italic ">mockData sample:<br>
        [{time: '2020-06-18T21:00:00 Z',
        cls: 'bg-red-alt',
        desc: 'Peter, Stephen' }] 
      </p> -->
    </header> 
    
    <!-- Calendar -->
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <div id="calendar"></div>
        </div>
       
      </div>
  </div>


    <!------------------------------------------- ADD NEW EVENTS ------------------------------------------------->

<div class="modal fade" id="addEVENTS" tabindex="1" aria-labelledby="addEVENTS" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form action = "#" method = "post">
            <div class="modal-header">
                <h5 class="modal-title" id="addEVENTS">Add New Events</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
                <label>Event title</label>
                  <input type="text" name="title" id="form3Example3" class=" form-control mb-2 form-control-md" placeholder="Enter Title Event">

                  <label>Add Description</label>
                      <textarea name="descADD" id="descADD" cols="30" rows="10"></textarea>
                  <label>Time</label>
                      <input type="time" name="timess" maxlength="20" id="form3Example4" class="form-control mb-2 form-control-md">
                <label>When</label>
                <input type="text" name="whens" maxlength="20" id="form3Example4" class="form-control mb-2 form-control-md" >
                <label>Where</label>
                <input type="text" name="wheres" maxlength="20" id="form3Example4" class="form-control mb-2 form-control-md" >
                <label>What</label>
                <input type="text" name="whats" maxlength="20" id="form3Example4" class="form-control mb-2 form-control-md" >
                <label>Why</label>
                <input type="text" name="whys" maxlength="20" id="form3Example4" class="form-control mb-2 form-control-md" >
                <label>Who</label>
                <input type="text" name="whats" maxlength="20" id="form3Example4" class="form-control mb-2 form-control-md" >
                <label>Start Event</label>
                <input type="date" name="starsevent" maxlength="20" id="form3Example4" class="form-control mb-2 form-control-md" >
                <label>End Event</label>
                <input type="date" name="endsevent" maxlength="20" id="form3Example4" class="form-control mb-2 form-control-md" >
                
                
                 <!-- BUTTON -->
                 <!-- BUTTON -->
               
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning btn-lg" name = "addEVENTS" id = "addEVENTS">ADD EVENT</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
  <script type="module" src="../calendar_new/js/main.js"></script>
</body>

</html>