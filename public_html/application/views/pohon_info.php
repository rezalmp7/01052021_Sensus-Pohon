
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-padding-remove-vertical uk-margin-remove body-content">
                        <div
                            class="uk-width-1-1 uk-child-width-1-3 uk-padding-remove uk-margin-remove-left uk-margin-remove-right uk-margin-small-top heading">
                            <div class="uk-width-1-1 uk-padding uk-padding-remove-vertical uk-margin-remove">
                                <ul class="uk-breadcrumb">
                                    <li><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>
                                    <li><a href="<?php echo base_url(); ?>pohon">Pohon</a></li>
                                    <li><span>Info</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="uk-width-1-1 uk-padding uk-margin-remove" uk-grid>
                            <div class="uk-width-1-2 uk-padding-remove uk-margin-remove">
                                <table style="border: 0px">
                                    <tr>
                                        <th style="padding-right: 20px">Kode</th>
                                        <td><?php echo $pohon->kode; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="padding-right: 20px">Blok</th>
                                        <td><?php echo $pohon->blok; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="uk-width-1-2 uk-padding-remove uk-margin-remove">
                                <table style="border: 0px">
                                    <tr>
                                        <th style="padding-right: 20px">Baris</th>
                                        <td><?php echo $pohon->baris; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="padding-right: 20px">No Pohon</th>
                                        <td><?php echo $pohon->no_pohon; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="uk-width-1-1 uk-padding uk-padding-remove-horizontal uk-margin-remove">
                            <div class="uk-padding-small uk-margin-remove table">
                                <div class="uk-overflow-auto">
                                    <table id="data_table" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Kode</th>
                                                <th>Jumlah Buah</th>
                                                <th>Buah Rusak</th>
                                                <th>Buah Siap Panen</th>
                                                <th>Sisa Buah</th>
                                                <th>Foto</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($laporan as $b) {
                                            ?>
                                            <tr>
                                                <td><?php echo date('d F Y', strtotime($b->create_at)); ?></td>
                                                <td><?php echo $b->kode_pohon; ?></td>
                                                <td><?php echo $b->jml_buah; ?></td>
                                                <td><?php echo $b->buah_rusak; ?></td>
                                                <td><?php echo $b->buah_sp_pn; ?></td>
                                                <td><?php echo $b->sisa; ?></td>
                                                <td><img style="width:70px;" src="<?php echo base_url(); ?>assets/img/laporan/<?php echo $b->foto; ?>"></td>
                                                <td>
                                                    <?php
                                                    if($b->status == 'benar')
                                                    {
                                                    ?>
                                                    <span class="uk-text-success"><span class="iconify" data-icon="ant-design:check-circle-filled" data-inline="false"></span> Benar</span>
                                                    <?php
                                                    }
                                                    if($b->status == 'salah')
                                                    {
                                                    ?>
                                                    <span class="uk-text-danger"><span class="iconify" data-icon="ant-design:close-circle-filled" data-inline="false"></span> Salah</span>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>laporan/info?id=<?php echo $b->id; ?>"
                                                        class="uk-button uk-button-primary uk-button-small"><span
                                                            class="iconify" data-icon="grommet-icons:info"
                                                            data-inline="false"></span></a>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>