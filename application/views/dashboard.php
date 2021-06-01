                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-padding-remove-vertical uk-margin-remove body-content">
                        <div class="uk-width-1-1 uk-child-width-1-3 uk-padding-remove uk-margin-remove-left uk-margin-remove-right uk-margin-small-top uk-grid-match card" uk-grid>
                            <div class="body-card">
                                <div>
                                    <div class="uk-width-1-1 heading">Jumlah Pohon</div>
                                    <div class="uk-width-1-1 uk-text-right value"><?php echo $jumlah_pohon; ?></div>
                                </div>
                            </div>
                            <div class="body-card">
                                <div>
                                    <div class="uk-width-1-1 heading">Buah Rusak</div>
                                    <div class="uk-width-1-1 uk-text-right value"><?php if($jumlah_buah_rusak->jml_buah_rusak != null) echo $jumlah_buah_rusak->jml_buah_rusak; else echo 0; ?></div>
                                </div>
                            </div>
                            <div class="body-card">
                                <div>
                                    <div class="uk-width-1-1 heading">Buah Siap Panen</div>
                                    <div class="uk-width-1-1 uk-text-right value"><?php if($jumlah_siap_panen->jml_sp_pn != null) echo $jumlah_siap_panen->jml_sp_pn; else echo '0'; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-1-1 uk-padding uk-padding-remove-horizontal uk-margin-remove">
                            <div class="uk-width-1-1 uk-padding-small uk-margin-remove table">
                                <h3>LAPORAN HARI INI</h3>
                                <table class="uk-table uk-table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Kode</th>
                                            <th>Jml Pohon</th>
                                            <th>Panen</th>
                                            <th>Rusak</th>
                                            <th>Sisa</th>
                                            <th>Photo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($laporan_hari_ini as $a) {
                                        ?>
                                        <tr>
                                            <td><?php echo date('d-m-Y H:i:s', strtotime($a->create_at)); ?></td>
                                            <td><?php echo $a->kode_pohon; ?></td>
                                            <td><?php echo $a->jml_buah; ?></td>
                                            <td><?php echo $a->buah_sp_pn; ?></td>
                                            <td><?php echo $a->buah_rusak; ?></td>
                                            <td><?php echo $a->sisa; ?></td>
                                            <td><img style="width: 75px;" src="<?php echo base_url(); ?>assets/img/laporan/<?php echo $a->foto; ?>"></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <div class="uk-width-1-1 uk-text-right uk-padding-remove uk-margin-remove uk-clearefix">
                                    <a href="<?php echo base_url(); ?>laporan" class="uk-button button-success-line"><span class="iconify" data-icon="bx:bx-show-alt" data-inline="false"></span> LIHAT SELENGKAPNYA</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>