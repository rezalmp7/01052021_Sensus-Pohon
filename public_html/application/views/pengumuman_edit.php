
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-padding-remove-vertical uk-margin-remove body-content">
                        <div
                            class="uk-width-1-1 uk-child-width-1-3 uk-padding-remove uk-margin-remove-left uk-margin-remove-right uk-margin-small-top heading">
                            <div class="uk-width-1-1 uk-padding uk-padding-remove-vertical uk-margin-remove">
                                <ul class="uk-breadcrumb">
                                    <li><a href="dashboard.html">Dashboard</a></li>
                                    <li><a href="pohon.html">Pohon</a></li>
                                    <li><span>Tambah</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="uk-width-2-3 uk-padding">
                            <form class="uk-form-stacked" method="POST" action="<?php echo base_url(); ?>pengumuman/edit_aksi">
                                <div class="uk-modal-body" uk-overflow-auto>
                                
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">ID</label>
                                        <div class="uk-form-controls">
                                            <?php echo $pengumuman->id; ?>
                                            <input class="uk-input field-default " id="form-stacked-text" name="id" value="<?php echo $pengumuman->id; ?>" type="hidden">
                                        </div>
                                    </div>
                                
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">Pengumuman</label>
                                        <div class="uk-form-controls">
                                            <textarea class="uk-textarea" name="pengumuman" rows="4"><?php echo $pengumuman->pengumuman; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">Tanggal Mulai - Tanggal Selesai</label>
                                        <div class="uk-form-controls" uk-grid>
                                            <div class="uk-width-1-2@s">
                                                <small>Tanggal Mulai</small>
                                                <input class="uk-input" type="date" value="<?php echo $pengumuman->tgl_mulai; ?>" name="tgl_mulai">
                                            </div>
                                            <div class="uk-width-1-2@s">
                                                <small>Tanggal Selesai</small>
                                                <input class="uk-input" type="date" value="<?php echo $pengumuman->tgl_akhir; ?>" name="tgl_selesai">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="uk-margin">
                                        <input type="submit" class="uk-button uk-button-primary uk-float-right" value="SIMPAN">
                                    </div>
                                
                                </div>
                            </form>
                        </div>
                    </div>
                </div>