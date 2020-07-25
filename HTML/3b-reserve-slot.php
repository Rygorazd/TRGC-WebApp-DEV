<!DOCTYPE html>
<html>
  <head>
    <title>
      PHP Reservation Demo - Single Time Slot Booking
    </title>
    <script src="/public/3b-reserve-slot.js"></script>
    <link href="/public/3-theme.css" rel="stylesheet">
  </head>
  <body>
    <h1>
      RESERVATION
    </h1>
    <form id="res_form" onsubmit="return res.save()">
      <label for="res_name">Name</label>
      <input type="text" required id="res_name"/>
      <label for="res_email">Email</label>
      <input type="email" required id="res_email"/>
      <label for="res_tel">Telephone Number</label>
      <input type="text" required id="res_tel"/>
      <label for="res_notes">Notes (if any)</label>
      <input type="text" id="res_notes"/>
      <label>Reservation Date</label>
      <div id="res_date" class="calendar"></div>
      <label>Reservation Slot</label>
      <div id="res_slot"></div>
      <button id="res_go" disabled>
        Submit
      </button>
    </form>
  </body>
</html>