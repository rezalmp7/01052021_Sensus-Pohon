
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-padding-remove-vertical uk-margin-remove body-content">
                        <div
                            class="uk-width-1-1 uk-child-width-1-3 uk-padding-remove uk-margin-remove-left uk-margin-remove-right uk-margin-small-top heading">
                            <div class="uk-width-1-1 uk-padding uk-padding-remove-vertical uk-margin-remove">
                                <ul class="uk-breadcrumb">
                                    <li><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>
                                    <li><a href="<?php echo base_url(); ?>laporan">Laporan</a></li>
                                    <li><span>Info</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="uk-width-1-1 uk-padding uk-margin-remove" uk-grid>
                            <div class="uk-width-2-3 uk-padding-remove uk-margin-remove">
                                <table class="uk-table" style="border: 0px">
                                    <tr>
                                        <th style="padding-right: 20px;">Tanggal</th>
                                        <td><?php echo date('H:i:s d F Y', strtotime($laporan->create_at)); ?></td>
                                    </tr>
                                    <tr>
                                        <th style="padding-right: 20px;">Kode</th>
                                        <td><?php echo $laporan->kode_pohon; ?></td>
                                    </tr>
                                    <?php
                                    $pohon = explode("-",$laporan->kode_pohon);
                                    ?>
                                    <tr>
                                        <th style="padding-right: 20px;">Blok</th>
                                        <td><?php echo $pohon[0]; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="padding-right: 20px;">Baris</th>
                                        <td><?php echo $pohon[1]; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="padding-right: 20px;">No Pohon</th>
                                        <td><?php echo $pohon[2]; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="padding-right: 20px;">Jumlah Buah</th>
                                        <td><?php echo $laporan->jml_buah; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="padding-right: 20px;">Panen</th>
                                        <td><?php echo $laporan->buah_sp_pn; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="padding-right: 20px;">Rusak</th>
                                        <td><?php echo $laporan->buah_rusak; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="padding-right: 20px;">Sisa</th>
                                        <td><?php echo $laporan->sisa; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="padding-right: 20px;">Status</th>
                                        <td>
                                            <?php
                                            if($laporan->status == 'benar')
                                            {
                                            ?>
                                            <span class="uk-text-success"><span class="iconify" data-icon="ant-design:check-circle-filled" data-inline="false"></span> Benar</span>
                                            <?php
                                            }
                                            if($laporan->status == 'salah')
                                            {
                                            ?>
                                            <span class="uk-text-danger"><span class="iconify" data-icon="ant-design:close-circle-filled" data-inline="false"></span> Salah</span>
                                            <?php
                                            }
                                            ?>    
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="padding-right: 20px;">Photo</th>
                                        <td><img style="width:100" src="<?php echo base_url(); ?>assets/img/laporan/<?php echo $laporan->foto; ?>"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>