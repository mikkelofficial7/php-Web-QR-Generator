
<!-- first click here to print -->

<div class="container">
    <div class="table table-detail">
    <form class="update-form" method="post" action="<?= base_url() ?>Qr_code_generate/ProcessCreateEvent">
    <table class="table">
        <thead>
        <tr>
            <th><i class="fa fa-spinner fa-pulse"></i></th>
            <th>Event Name</th>
            <th>Event Description</th>
            <th>Organizer</th>
            <th>Event Address</th>
            <th>Event Start Time</th>
            <th>Event End Time</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Fill here <i class="fa fa-arrow-right" aria-hidden="true"></i></i></td>
            <td><input type="text" class="text-name" name="nama_event" required="required"></td>
            <td><input type="text" class="text-name" name="desc_event" max-length="200" required="required"></td>
            <td><input type="text" class="text-name" maxlength="100" name="organizer" required="required"></td>
            <td><input type="text" name="alamat_event" required="required"></td>
            <td><input type="text" class="text-time" id="starttime" name="start_time" placeholder="mm-dd-yyyy" required="required"><input type="text" class="text-time" id="starttime2" name="start_time2" placeholder="h:i:s" required="required"></td>
            <td><input type="text" class="text-time" id="endtime" name="end_time" placeholder="mm-dd-yyyy" required="required"><input type="text" class="text-time" id="endtime2" name="end_time2" placeholder="h:i:s" required="required"></td>
        </tr>
        </tbody>
        <thead>
        <tr>
            <th>Quota</th>
            <th>Event Start Registration</th>
            <th>Event End Registration</th>
            <th>PIC Name</th>
            <th>PIC Email</th>
            <th>PIC Phone</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input type="text" class="text-quota" name="kuota" required="required"></td>
            <td><input type="text" class="text-time" id="startreg" name="start_registration" placeholder="mm-dd-yyyy" required="required"><input type="text" class="text-time" id="startreg2" name="start_registration2" placeholder="h:i:s" required="required"></td>
            <td><input type="text" class="text-time" id="endreg" name="end_registration" placeholder="mm-dd-yyyy" required="required"><input type="text" class="text-time" id="endreg2" name="end_registration2" placeholder="h:i:s" required="required"></td>
            <td><input type="text" name="nama_PIC" maxlength="100" required="required"></td>
            <td><input type="email" name="email_PIC" placeholder="mail@example.com" required="required"></td>
            <td><input type="text" class="text-phone" maxlength="15" name="phone_PIC" placeholder="0857xxxxxxxx" required="required"></td>
        </tr>
        </tbody>
    </table>
    </div>
    <div class="update-group">
        <input type="submit" class="btn btn-warning" value="Simpan Data">
    </div>
    </form>
    <script>
	  $( function() {
	    $( "#starttime" ).datepicker();
	    $( "#endtime" ).datepicker();
	    $( "#startreg" ).datepicker();
	    $( "#endreg" ).datepicker();

		$('#starttime2').timepicki(); 
		$('#endtime2').timepicki();
		$('#startreg2').timepicki();
		$('#endreg2').timepicki();
	  } );
  </script>
</div>



            
            

            
