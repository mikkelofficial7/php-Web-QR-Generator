
<!-- first click here to print -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="container">
    <div class="table table-detail">
        <table id="myTable" class="table">
            <thead>
            <tr>
                <th>No</th>
                <th>Event ID</th>
                <th>Participant Name</th>
                <th>Address</th>
                <th>Register Date Time</th>
                <th>Occupation</th>
                <th>workplace</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status Absen</th>
                <th>Remove</th>
            </tr>
            </thead>
                <tbody>
                <?php $no = 1; foreach($user as $item){?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?= $item->id_member ?></td>
                    <td><?php echo $item->nama; ?></td>
                    <td><?php echo $item->alamat; ?></td>
                    <td><?php echo $item->tgl_daftar; ?></td>
                    <td><?php echo $item->pekerjaan; ?></td>
                    <td><?php echo $item->tempat_kerja; ?></td>
                    <td><a href="mailto:<?= $item->email; ?>"><i class="material-icons">email</i></td>
                    <td><a href="tel:<?= $item->phone ?>"><i class="material-icons">local_phone</i></td>
                    <td><?php echo $item->status_hadir; ?></td>
                    <td><?php echo anchor('Qr_code_generate/ProcessDeleteMember/'.$item->id_member,'<button class="btn btn-danger"><i class="fa fa-remove"></i> Remove</button>'); ?></td>
                </tr>
                <?php $no++; } ?>
                </tbody>
        </table>
    </div>
    <script>
        // get the table element
        var $table = document.getElementById("myTable"),
        // number of rows per page
        $n = 5,
        // number of rows of the table
        $rowCount = $table.rows.length,
        // get the first cell's tag name (in the first row)
        $firstRow = $table.rows[0].firstElementChild.tagName,
        // boolean var to check if table has a head row
        $hasHead = ($firstRow === "TH"),
        // an array to hold each row
        $tr = [],
        // loop counters, to start count from rows[1] (2nd row) if the first row has a head tag
        $i,$ii,$j = ($hasHead)?1:0,
        // holds the first row if it has a (<TH>) & nothing if (<TD>)
        $th = ($hasHead?$table.rows[(0)].outerHTML:"");
        // count the number of pages
        var $pageCount = Math.ceil($rowCount / $n);
        // if we had one page only, then we have nothing to do ..
        if ($pageCount > 1) {
            // assign each row outHTML (tag name & innerHTML) to the array
            for ($i = $j,$ii = 0; $i < $rowCount; $i++, $ii++)
                $tr[$ii] = $table.rows[$i].outerHTML;
            // create a div block to hold the buttons
            $table.insertAdjacentHTML("afterend","<div id='buttons'></div");
            // the first sort, default page is the first one
            sort(1);
        }

        // ($p) is the selected page number. it will be generated when a user clicks a button
        function sort($p) {
            /* create ($rows) a variable to hold the group of rows
            ** to be displayed on the selected page,
            ** ($s) the start point .. the first row in each page, Do The Math
            */
            var $rows = $th,$s = (($n * $p)-$n);
            for ($i = $s; $i < ($s+$n) && $i < $tr.length; $i++)
                $rows += $tr[$i];
            
            // now the table has a processed group of rows ..
            $table.innerHTML = $rows;
            // create the pagination buttons
            document.getElementById("buttons").innerHTML = pageButtons($pageCount,$p);
            // CSS Stuff
            document.getElementById("id"+$p).setAttribute("class","active");
        }


        // ($pCount) : number of pages,($cur) : current page, the selected one ..
        function pageButtons($pCount,$cur) {
            /* this variables will disable the "Prev" button on 1st page
               and "next" button on the last one */
            var $prevDis = ($cur == 1)?"disabled":"",
                $nextDis = ($cur == $pCount)?"disabled":"",
                /* this ($buttons) will hold every single button needed
                ** it will creates each button and sets the onclick attribute
                ** to the "sort" function with a special ($p) number..
                */
                $buttons = "<input type='button' value='&lt;&lt; Prev' onclick='sort("+($cur - 1)+")' "+$prevDis+">";
            for ($i=1; $i<=$pCount;$i++)
                $buttons += "<input type='button' id='id"+$i+"'value='"+$i+"' onclick='sort("+$i+")'>";
            $buttons += "<input type='button' value='Next &gt;&gt;' onclick='sort("+($cur + 1)+")' "+$nextDis+">";
            return $buttons;
        }
    </script>
</div>
