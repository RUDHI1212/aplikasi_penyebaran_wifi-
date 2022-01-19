<h2>Konfirmasi Check Out</h2>
<div class="kotak2">
<?php
$grand_total = 0;
if ($cart = $this->cart->contents())
	{
		foreach ($cart as $item)
			{
				$grand_total = $grand_total + $item['subtotal'];
			}
			$total = $this->session->userdata('dompet') - $grand_total;
		echo "<h4>Total Belanja: Rp.".number_format($grand_total,0,",",".")."</h4>";

foreach ($sess as $row);
?>
<form class="form-horizontal" action="<?php echo base_url()?>USER/home/proses_order" method="post" name="frmCO" id="frmCO">
    <input type="hidden" name="id" class="form-control" value="<?php echo $kodeuni ;?>" readonly>
    <input type="hidden" name="id_pembeli" class="form-control" value="<?php echo $this->session->userdata('id_user');?>" readonly>
     <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user')?>" required>
        <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3" for="inputEmail">Email:</label>
            <div class="col-xs-9">
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $this->session->userdata('email'); ?>">
            </div>
        </div>
        <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3" for="firstName">Nama :</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $this->session->userdata('name'); ?>" readonly>
            </div>
        </div>
        <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3" for="lastName">Kelas :</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $this->session->userdata('kelas'); ?>">
            </div>
        </div>
        <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3" for="phoneNumber">Telp:</label>
            <div class="col-xs-9">
                <input type="tel" class="form-control" name="telp" id="telp" value="<?php echo $this->session->userdata('contact'); ?>">
            </div>
        </div>

    <input type="hidden" class="form-control" name="id_user" value="<?php echo $this->session->userdata('id_user');?>">
            <input type="hidden" class="form-control" name="Dompet" value="<?php echo $total;?>">
        <a class="form-group  has-success has-feedback">
            <?php if($row->Dompet <= $grand_total){ ?>
            <a href="<?php base_url() ?>/food/index.php/eror/" <button class="btn btn-primary"> Proses Order</button> </a>
            <?php }
            else{ ?>
                <button type="submit" class="btn btn-primary">Proses Order</button>
            <?php } ?>
            </div>
        </div>
    </form>
    <?php
	}
	else
		{
			echo "<h5>Shopping Cart masih kosong</h5>";	
		}
	?>
</div>
