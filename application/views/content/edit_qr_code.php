
<!-- first click here to print -->

<div class="container">
    <div class="table table-detail">
    <form class="update-form" method="post" action="<?= base_url() ?>Qr_code_generate/ProcessEditDetailEvent">
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
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
            <td><input type="hidden" name="id_event" value="<?php echo $id_event; ?>" /><?= $id_event; ?></td>
            <td><input type="text" class="text-name" name="nama_event" value="<?php echo $nama_event; ?>" required="required"></td>
            <td><input type="text" class="text-name" name="desc_event" value="<?php echo $desc_event; ?>" required="required"></td>
            <td><input type="text" class="text-name" maxlength="100" name="organizer" value="<?php echo $organizer; ?>" required="required"></td>
            <td><input type="text" name="alamat_event" value="<?php echo $alamat_event; ?>" required="required"></td>
            <td><input type="text" class="text-time" id="starttime" name="start_time" value="<?php $dates = explode(' ', $start_time); echo $dates[0]; ?>" placeholder="mm-dd-yyyy" required="required"><input type="text" class="text-time" id="starttime2" name="start_time2" value="<?php $dates = explode(' ', $start_time); echo $dates[1]; ?>" placeholder="h:i:s" required="required"></td>
            <td><input type="text" class="text-time" id="endtime" value="<?php $dates = explode(' ', $end_time); echo $dates[0]; ?>" name="end_time" placeholder="mm-dd-yyyy" required="required"><input type="text" class="text-time" id="endtime2" name="end_time2" placeholder="h:i:s" value="<?php $dates = explode(' ', $end_time); echo $dates[1]; ?>" required="required"></td>
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
            <td><input type="text" class="text-quota" name="kuota" value="<?php echo $kuota; ?>" required="required"></td>
            <td><input type="text" class="text-time" id="startreg" name="start_registration" placeholder="mm-dd-yyyy" value="<?php $dates = explode(' ', $start_registration); echo $dates[0]; ?>" required="required"><input type="text" class="text-time" id="startreg2" name="start_registration2" placeholder="h:i:s" value="<?php $dates = explode(' ', $start_registration); echo $dates[1]; ?>" required="required"></td>
            <td><input type="text" class="text-time" id="endreg" name="end_registration" value="<?php $dates = explode(' ', $end_registration); echo $dates[0]; ?>" placeholder="mm-dd-yyyy" required="required"><input type="text" class="text-time" id="endreg2" name="end_registration2" value="<?php $dates = explode(' ', $end_registration); echo $dates[1]; ?>" placeholder="h:i:s" required="required"></td>
            <td><input type="text" name="nama_PIC" value="<?php echo $nama_PIC; ?>" maxlength="100" required="required"></td>
            <td><input type="email" name="email_PIC" value="<?php echo $email_PIC; ?>" placeholder="mail@example.com" required="required"></td>
            <td><input type="text" class="text-phone" value="<?php echo $phone_PIC; ?>" maxlength="15" name="phone_PIC" placeholder="0857xxxxxxxx" required="required"></td>
        </tr>
        </tbody>
    </table>
    </div>
    <div class="update-group">
        <a href="<?= base_url() ?>Qr_code_generate/DetailEvent/<?= $id_event ?>" class="btn btn-success" ><i class="fa fa-caret-square-o-left"></i> Back</a>
        <input type="submit" class="btn btn-warning" value="Save Data">
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



            
            

            
