
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-padding-remove-vertical uk-margin-remove body-content">
                        <div
                            class="uk-width-1-1 uk-child-width-1-3 uk-padding-remove uk-margin-remove-left uk-margin-remove-right uk-margin-small-top heading">
                            <div class="uk-width-1-1 uk-padding uk-padding-remove-vertical uk-margin-remove">
                                <ul class="uk-breadcrumb">
                                    <li><a href="dashboard.html">Dashboard</a></li>
                                    <li><span>Pengumuman</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="uk-width-1-1 uk-padding uk-margin-remove">
                            <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                                <h5 class="poppins-semi-bold">Foto Perusahaan</h5>
                                <div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-text-center img-slider" uk-grid>
                                    <?php
                                    foreach ($foto as $a) {
                                    ?>
                                    <div>
                                        <div class="uk-inline">
                                            <img class="uk-width-1-1 uk-padding-remove uk-margin-remove" src="<?php echo base_url(); ?>assets/img/slide/<?php echo $a->src; ?>">
                                            <div class="uk-overlay uk-padding-remove uk-position-top">
                                                <a href="<?php echo base_url(); ?>pengumuman/hapus_slide?id=<?php echo $a->id; ?>&gmb=<?php echo $a->src; ?>" class="uk-button uk-button-danger uk-button-small"><span class="iconify"
                                                        data-icon="bx:bxs-trash-alt" data-inline="false"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <div>
                                        <a href="#tambah_photo" uk-toggle>
                                            <div class="uk-card uk-padding-small uk-card-body"><span class="iconify" data-icon="akar-icons:plus" data-inline="false"></span></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-1-1 uk-padding-remove uk-margin-medium-top">
                                <form id="form_profil" method="POST" action="<?php echo base_url(); ?>pengumuman/update_profil">
                                    <div class="uk-width-1-1 uk-clearfix uk-margin-remove" uk-grid>
                                        <h5 class="uk-padding-remove poppins-semi-bold">Profile Prusahaan</h5>
                                        <div class="uk-width-expand uk-text-right"><a href="#" class="uk-width-auto uk-float-right uk-link-text" onclick="document.getElementById('form_profil').submit()"><span class="iconify" data-icon="bx:bx-edit-alt" data-inline="false"></span></a></div>
                                    </div>
                                    <div class="uk-width-1-1">
                                        <textarea class="uk-textarea uk-width-1-1" rows="5" name="profil"><?php if(isset($profil->profil)) echo $profil->profil; ?></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="uk-width-1-1 uk-padding-remove uk-margin-medium-top">
                                <h5 class="poppins-semi-bold">Pengumuman</h5>
                                <div class="uk-width-1-1 uk-padding-remove uk-clearfix">
                                    <div class="uk-width-1-1">
                                        <a class="uk-button button-success-line uk-float-right" href="#modal-overflow" uk-toggle><span class="iconify"
                                                data-icon="akar-icons:plus" data-inline="false"></span>
                                            Tambah</a>
                                    </div>
                                </div>
                                <div class="uk-width-1-1 uk-padding uk-padding-remove-horizontal uk-margin-remove">
                                    <div class="uk-padding-small uk-margin-remove table">
                                        <table id="data_table" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>Tanggal</th>
                                                    <th>Deskripsi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($pengumuman as $b) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo date('d-m-Y H:i:s', strtotime($b->create_at)); ?></td>
                                                    <td><?php echo $b->pengumuman; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url(); ?>pengumuman/edit?id=<?php echo $b->id; ?>" class="uk-button button-uk-warning uk-button-small"><span
                                                                class="iconify" data-icon="fa-solid:pen" data-inline="false"></span></a>
                                                        <a href="<?php echo base_url(); ?>pengumuman/hapus?id=<?php echo $b->id; ?>" class="uk-button uk-button-danger uk-button-small"><span
                                                                class="iconify" data-icon="bx:bxs-trash-alt" data-inline="false"></span></a>
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
                    <div id="modal-overflow" class="uk-modal-container" uk-modal>
                        <div class="uk-modal-dialog">
                    
                            <button class="uk-modal-close-default" type="button" uk-close></button>
                    
                            <div class="uk-modal-header">
                                <h2 class="uk-modal-title">Tambah Pengumuman</h2>
                            </div>
                    
                            <form class="uk-form-stacked" method="POST" action="<?php echo base_url(); ?>pengumuman/tambah_pengumuman">
                                <div class="uk-modal-body" uk-overflow-auto>
                    
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">Pengumuman</label>
                                        <div class="uk-form-controls">
                                            <textarea class="uk-textarea" name="pengumuman" rows="4"></textarea>
                                        </div>
                                    </div>

                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">Tanggal Mulai - Tanggal Selesai</label>
                                        <div class="uk-form-controls" uk-grid>
                                            <div class="uk-width-1-2@s">
                                                <small>Tanggal Mulai</small>
                                                <input class="uk-input" type="date" name="tgl_mulai">
                                            </div>
                                            <div class="uk-width-1-2@s">
                                                <small>Tanggal Selesai</small>
                                                <input class="uk-input" type="date" name="tgl_selesai">
                                            </div>
                                        </div>
                                    </div>
                    
                                </div>
                    
                                <div class="uk-modal-footer uk-text-right">
                                    <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                                    <input type="submit" class="uk-button uk-button-primary" value="SAVE">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="tambah_photo" class="uk-modal-container" uk-modal>
                        <div class="uk-modal-dialog">
                    
                            <button class="uk-modal-close-default" type="button" uk-close></button>
                    
                            <div class="uk-modal-header">
                                <h2 class="uk-modal-title">Tambah Gambar</h2>
                            </div>
                    
                            <form class="uk-form-stacked" enctype='multipart/form-data' method="POST" action="<?php echo base_url(); ?>pengumuman/tambah_slide">
                                <div class="uk-modal-body" uk-overflow-auto>

                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">ID</label>
                                        <div class="uk-form-controls">
                                            <?php echo $id_slide; ?>
                                            <input id="form-stacked-text" name="id" type="hidden" value="<?php echo $id_slide; ?>">
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">Gambar</label>
                                        <div class="uk-form-controls">
                                            <input id="form-stacked-text" name="gambar" type="file" placeholder="Nama Lengkap...">
                                        </div>
                                    </div>
                                    
                    
                                </div>
                    
                                <div class="uk-modal-footer uk-text-right">
                                    <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                                    <input type="submit" class="uk-button uk-button-primary" value="SAVE">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>