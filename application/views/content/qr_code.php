
<!-- first click here to print -->

<div class="container">
    <div class="table table-detail">
    <table class="table">
        <thead>
        <tr>
            <th>Event ID</th>
            <th>Event Name</th>
            <th>Event Description</th>
            <th>Organizer</th>
            <th>Event Address</th>
            <th>Event Start Time</th>
            <th>Event End Time</th>
            <th>Quota</th>
            <th>Event Start Registration</th>
            <th>Event End Registration</th>
            <th>PIC Name</th>
            <th>PIC Email</th>
            <th>PIC Phone</th>
        </tr>
        </thead>
        <tbody>
        <tr style="width:100%;">
            <td><?= $item->id_event ?></a></td>
            <td><?= $item->nama_event; ?></td>
            <td><?= $item->desc_event; ?></td>
            <td><?= $item->organizer; ?></td>
            <td><?= $item->alamat_event; ?></td>
            <td><?= $item->start_time; ?></td>
            <td><?= $item->end_time; ?></td>
            <?php if($kuotas->count_kuota == "0"){ ?>
                <td>0/<?= $item->kuota; ?></td>
            <?php }else{ ?>
                <td><a href="<?= base_url() ?>qr_code_generate/ListPeserta/<?= $item->id_event ?>"><?= $kuota->count_kuota; ?></a>/<?= $item->kuota; ?></td>
            <?php } ?>
            <td><?= $item->start_registration; ?></td>
            <td><?= $item->end_registration; ?></td>
            <td><?= $item->nama_PIC; ?></td>
            <td><a href="mailto:<?= $item->email_PIC; ?>"><i class="material-icons">email</i></td>
            <td><a href="tel:<?= $item->phone_PIC; ?>"><i class="material-icons">local_phone</i></td>
        </tr>
        </tbody>
    </table>
    </div>
    <a href="<?= base_url() ?>qr_code_generate/print_qr/<?= $item->id_event ?>" class="btn btn-success" ><i class="fa fa-print"></i> Qr code</a>
    <a href="<?= base_url() ?>qr_code_generate/print_qr2/<?= $item->id_event ?>" class="btn btn-danger" ><i class="fa fa-print"></i> Qr code Absence</a>
    <a href="<?= base_url() ?>Qr_code_generate/EditDetailEvent/<?= $item->id_event ?>" class="btn btn-warning" ><i class="fa fa-edit"></i> Edit Data</a>
</div>
