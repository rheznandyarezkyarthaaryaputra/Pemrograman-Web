<table id="example" class="table table-striped table-bordered" style="width:100%;">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Jenis Kelamin</td>
            <td>Alamat</td>
            <td>No Telp</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php
            include 'koneksi.php';

            $no=1;
            $query="SELECT * from anggota order by id desc";
            $sql= $db1->prepare($query);
            $sql->execute();
            $res1= $sql->get_result();

            if($res1->num_rows >0){
                while($row = $res1->fetch_assoc()){
                    $id= $row['id'];
                    $nama=$row['nama'];
                    $jenis_kelamin = ($row['jenis_kelamin'] == 'L')?'Laki-laki':'Perempuan';
                    $alamat=$row['alamat'];
                    $no_telp =$row['no_telp'];
        ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$row["nama"]?></td>
                    <td><?=$jenis_kelamin?></td>
                    <td><?=$row["alamat"]?></td>
                    <td><?=$row["no_telp"]?></td>
                    <td>
                        <button id="<?php echo $id; ?>" class="btn btn-success btn-sm edit_data" data-action="edit"><i class="fa fa-edit"></i>Edit</button>
                        <button id="<?php echo $id; ?>" class="btn btn-danger btn-sm hapus_data" data-action="hapus"><i class="fa fa-trash"></i>Hapus</button>
                    </td>
                </tr>
        <?php
                }
            } else { ?>
                <tr>
                    <td colspan='7'>Tidak ada data ditemukan</td>
                </tr>
        <?php
            } ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function(){
    var table = $('#example').DataTable(); // Assign DataTable to a variable for later use

    // Reset error messages
    function reset(){
        document.getElementById("err_nama").innerHTML = "";
        document.getElementById("err_alamat").innerHTML = "";
        document.getElementById("err_jenis_kelamin").innerHTML= "";
        document.getElementById("err_no_telp").innerHTML = "";
    }

    // Edit data functionality
    $(document).on('click','.edit_data', function(){
        $('html, body').animate({scrollTop:0}, 'slow');
        var id = $(this).data('id'); // Changed to use data-id
        $.ajax({
            type: 'POST',
            url: "get_data.php",
            data: {id:id},
            dataType:'json',
            success: function(response){
                reset(); // Fixed typo, should be reset() not reset():
                $('html, body').animate({scrollTop: 30}, 'slow');
                // ... rest of your success code
            }, error: function(response){
                console.log(response.responseText);
            }
        });
    });

    // Delete data functionality
    $(document).on('click', '.hapus_data', function(){
        var id = $(this).data('id'); // Changed to use data-id
        if(confirm('Are you sure you want to delete this data?')){ // Confirm before delete
            $.ajax({
                type: 'POST',
                url: "hapus_data.php",
                data: {id:id},
                dataType:'json',
                success: function(response){
                    if(response.success){ // Check if the PHP file sent a success message
                        table.row($(this).parents('tr')).remove().draw(); // Remove the row from DataTable and redraw
                    } else {
                        alert('Error: ' + response.message); // Alert if there's an error
                    }
                }, error: function(response){
                    console.log(response.responseText);
                }

            });
        }
    });
});

</script>